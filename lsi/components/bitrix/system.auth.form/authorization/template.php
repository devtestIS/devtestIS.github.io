<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? use Bitrix\Main\Localization\Loc; ?>

<?
$frame = $this->createFrame()->begin('');

if($arResult["FORM_TYPE"] == "logout"){
    ?>
    <div class="authorization">
        <div class="authorization__user dropdown">
            <a class="authorization__link" href="#" data-toggle="dropdown">
                <?=$arResult["USER_NAME"] ?: 'Личный кабинет'?>
            </a>
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "dropdown-menu",
                Array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "user",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "2",
                    "MENU_CACHE_GET_VARS" => array(""),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_USE_GROUPS" => "N",
                    "ROOT_MENU_TYPE" => "user",
                    "USE_EXT" => "Y"
                )
            );?>
        </div>
    </div>
    <?
}else{
    ?>
    <div class="authorization">
        <button type="button"
                class="btn btn_authorization"
                data-toggle="modal"
                data-target="#modalAuth">
            <?=GetMessage("AUTH_LOGIN_BUTTON")?>
        </button><a class="btn btn_authorization"
           role="button"
           href="<?=$arResult["AUTH_REGISTER_URL"]?>"><?=GetMessage("AUTH_REGISTER")?></a>
    </div>
    <?
    \Intervolga\Custom\SiteTools::beginModal('modalAuth');
    ?>
    <div class="modal fade" id="modalAuth" tabindex="-1" role="dialog" aria-labelledby="modalAuth">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="system_auth_form<?=$arResult["RND"]?>" name="system_auth_form<?=$arResult["RND"]?>" method="post" action="/login/">
                <div class="modal-header">
                    <div class="modal__title">Авторизация</div>
                    <div class="modal__close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></div>
                </div>
                <div class="modal-body">
                    <div class="modal__compact">
                        <div class="form">
                            <?if($arResult["BACKURL"] <> ''):?>
                                <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                            <?endif?>
                            <?foreach ($arResult["POST"] as $key => $value):?>
                                <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
                            <?endforeach?>
                            <input type="hidden" name="AUTH_FORM" value="Y" />
                            <input type="hidden" name="TYPE" value="AUTH" />
                 
                            <div class="form-group">
                                <label for="USER_LOGIN">
                                    <?=GetMessage("AUTH_LOGIN")?><sup class="text-danger">*</sup>
                                </label>
                                <input type="email" class="form-control" name="USER_LOGIN" placeholder="<?=GetMessage("AUTH_LOGIN")?>" required="required">
                            </div>
                            <div class="form-group">
                                <label for="USER_PASSWORD">
                                    <?=GetMessage("AUTH_PASSWORD")?><sup class="text-danger">*</sup>
                                </label>
                                <input type="password" class="form-control" name="USER_PASSWORD" placeholder="<?=GetMessage("AUTH_PASSWORD")?>" required="required">
                            </div>
                            <div class="form-group captcha<?if(!$arResult["CAPTCHA_CODE"]){ echo ' hidden'; }?>">
                                <div class="form-group">
                                    <label for="inputCaptcha"><?=Loc::getMessage("AUTH_CAPTCHA_PROMT")?></label>
                                    <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" <?if(!$arResult["CAPTCHA_CODE"]){ echo ' disabled="disabled"'; }?> />
                                    <img name="captcha_sid_img" src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" alt="CAPTCHA" class="img-responsive center-block" />
                                </div>
                                <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           name="captcha_word"
                                           maxlength="50"
                                           value=""
                                           id="inputCaptcha"
                                           placeholder="<?=Loc::getMessage("AUTH_CAPTCHA_PROMT")?>"
                                        <?if(!$arResult["CAPTCHA_CODE"]){ echo ' disabled="disabled"'; }?>
                                    >
                                </div>
                            </div>
                            <div class="checkbox">
                                <label for="USER_REMEMBER">
                                    <input type="checkbox"
                                           id="USER_REMEMBER"
                                           name="USER_REMEMBER"
                                           value="Y">
                                    &nbsp;<?=GetMessage("AUTH_REMEMBER_ME")?>
                                </label>
                            </div>
                            <div class="errors"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="modal__compact">
                        <div class="row">
                            <div class="col-md-7 mbs">
                                <a class="btn btn-default btn-block" href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_REGISTER")?></a>
                            </div>
                            <div class="col-md-5">
                                <button class="btn btn-primary btn-block" type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>"><?=GetMessage("AUTH_LOGIN_BUTTON")?></button>
                            </div>
                        </div>
                        <a class="btn btn-link btn-block" href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#system_auth_form<?=$arResult["RND"]?>').submit(function () {
                var form = $(this);

                form.find('input,button').attr('disabled', 'disabled');

                var errors = form.find('.errors');
                errors.html('');
                var formData = {
                    'ajaxAuth': 'Y'
                };
                form.find('input,select,textarea').each(function(){
                    var obj = $(this);
                    if(obj.attr('type') == 'checkbox' && !obj.prop('checked')){
                        return;
                    }
                    formData[obj.attr('name')] = obj.val();
                });

                <?
                if($arResult['RSA_JS_DATA']){
                    ?>
                    rsasec_form(<?=\Bitrix\Main\Web\Json::encode($arResult['RSA_JS_DATA'])?>);
                    <?
                }
                ?>

                $.ajax({
                    method: "POST",
                    url: form.attr('action'),
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        if(data && data['RESULT'] && data['RESULT']=='OK'){
                            location.reload();
                        }else if(data && data['ERROR']){
                            errors.html('<div class="alert alert-danger">' + data['ERROR'] + '</div>');
                            if(data['CAPTCHA_CODE']){
                                form
                                    .find('.captcha')
                                    .removeClass('hidden')
                                    .find('input')
                                    .removeAttr('disabled');
                                form.find('[name="captcha_sid"]').val(data['CAPTCHA_CODE']);
                                form.find('[name="captcha_sid_img"]').attr('src', '/bitrix/tools/captcha.php?captcha_sid=' + data['CAPTCHA_CODE']);
                            }
                        }else{
                            errors.html('<div class="alert alert-danger">Не удалось авторизоваться, попробуйте позже.</div>');
                        }
                        form.find('input,button').removeAttr('disabled');
                        form.find('input[name="USER_PASSWORD"]').val('');
                        form.find('input[name="captcha_word"]').val('');
                    },
                    error: function () {
                        errors.html('<div class="alert alert-danger">Не удалось авторизоваться, попробуйте позже.</div>');
                        form.find('input,button').removeAttr('disabled');
                    }
                });

                return false;
            });
        });
    </script>
    <?
    \Intervolga\Custom\SiteTools::endModal();
}

$frame->end();
?>