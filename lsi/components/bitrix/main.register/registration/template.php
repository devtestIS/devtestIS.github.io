<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
if ($USER->IsAuthorized()) {
    ?>
    <div class="alert alert-success"><?=GetMessage("R_MAIN_REGISTER_AUTH")?></div>
    <?
} else {
    if (count($arResult["ERRORS"]) <= 0 && $arResult["USE_EMAIL_CONFIRMATION"] === "Y") {
        ?>
        <div class="alert alert-info"><?=GetMessage("R_REGISTER_EMAIL_WILL_BE_SENT")?></div>
        <?
    }
    ?>
    <form class="b-space" method="post" action="<?=POST_FORM_ACTION_URI?>" name="lsiregform">
        <?
        if ($arResult["BACKURL"] <> '') {
            ?>
            <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>"/>
            <?
        }
        ?>
        <div class="errors">
            <?
            if (count($arResult["ERRORS"]) > 0) {
                foreach ($arResult["ERRORS"] as $key => $error) {
                    if (intval($key) == 0 && $key !== 0) {
                        $arResult["ERRORS"][$key] = str_replace(
                            "#FIELD_NAME#", "&quot;" . GetMessage("R_REGISTER_FIELD_" . $key) . "&quot;", $error
                        );
                    }
                    $error = preg_replace(
                        '/(Пользователь с таким e-mail \([^\(\)]+\) уже существует\.)/ui',
                        '\1 Попробуйте <a href="/login/?forgot_password=yes">восстановить пароль.</a>',
                        $error);

                    $arResult["ERRORS"][$key] = preg_replace(
                        '/(\s+|(<br\/?>)+)?(Пользователь с логином "[^\"]+" уже существует\.)/ui',
                        '',
                        $error);
                }
                ?>
                <div class="alert alert-danger"><?=implode("<br />", $arResult["ERRORS"])?></div>
                <?
            }
            ?>
        </div>
        <div class="form-group clearfix">
            <label for="REGISTER_EMAIL" class="col-sm-3 control-label"><?=GetMessage("R_REGISTER_FIELD_EMAIL")?><sup
                    class="text-danger">*</sup></label>
            <div class="col-sm-9">
                <input type="hidden"
                       id="REGISTER_LOGIN"
                       name="REGISTER[LOGIN]"
                       value="<?=$arResult["VALUES"]['EMAIL']?>">
                <input type="email"
                       class="form-control"
                       id="REGISTER_EMAIL"
                       name="REGISTER[EMAIL]"
                       placeholder="<?=GetMessage("R_REGISTER_FIELD_EMAIL")?>"
                       value="<?=$arResult["VALUES"]['EMAIL']?>"
                       required="required">
            </div>
        </div>

        <div class="form-group clearfix">
            <label for="REGISTER_PASSWORD" class="col-sm-3 control-label"><?=GetMessage("R_REGISTER_FIELD_PASSWORD")?>
                <sup class="text-danger">*</sup></label>
            <div class="col-sm-9">
                <input type="password"
                       class="form-control"
                       id="REGISTER_PASSWORD"
                       name="REGISTER[PASSWORD]"
                       placeholder="<?=GetMessage("R_REGISTER_FIELD_PASSWORD")?>  (от 6 до 12 символов)"
                       autocomplete="off"
                       minlength="<?=$arResult["GROUP_POLICY"]["PASSWORD_LENGTH"]?>"
                       maxlength="12"
                       data-minlength="<?=$arResult["GROUP_POLICY"]["PASSWORD_LENGTH"]?>"
                       data-error="<?=$arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]?>"
                       required="required">
            </div>
        </div>

        <div class="form-group clearfix">
            <label for="REGISTER_CONFIRM_PASSWORD"
                   class="col-sm-3 control-label"><?=GetMessage("R_REGISTER_FIELD_CONFIRM_PASSWORD")?><sup
                    class="text-danger">*</sup></label>
            <div class="col-sm-9">
                <input type="password"
                       class="form-control"
                       id="REGISTER_CONFIRM_PASSWORD"
                       name="REGISTER[CONFIRM_PASSWORD]"
                       placeholder="<?=GetMessage("R_REGISTER_FIELD_CONFIRM_PASSWORD")?> (от 6 до 12 символов)"
                       autocomplete="off"
                       minlength="<?=$arResult["GROUP_POLICY"]["PASSWORD_LENGTH"]?>"
                       maxlength="12"
                       required="required">
            </div>
        </div>

        <?
        if ($arResult["USE_CAPTCHA"] == "Y") {
            ?>
            <div class="form-group clearfix">
                <label for="captcha_word" class="col-sm-3 control-label"><?=GetMessage("R_REGISTER_CAPTCHA_PROMT")?><sup
                        class="text-danger">*</sup></label>
                <div class="col-sm-3">
                    <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>"/>
                    <div
                        style="background-color: #fff; border: 1px solid #ccc; border-radius: 3px; height: 36px; overflow: hidden;">
                        <img class="img-responsive center-block" style="max-height: 100%;"
                             src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" alt="CAPTCHA"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <input type="text"
                           class="form-control"
                           id="captcha_word"
                           name="captcha_word"
                           placeholder="<?=GetMessage("R_REGISTER_CAPTCHA_PROMT")?>"
                           autocomplete="off"
                           required="required">
                </div>
            </div>
            <?
        }
        ?>

        <div class="form-group clearfix">
            <div class="col-sm-offset-3 col-md-3 col-sm-9">
                <input class="btn btn-primary btn-block" type="submit" name="register_submit_button"
                       value="<?=GetMessage("R_AUTH_REGISTER")?>"/>
            </div>
            <div class="col-md-offset-0 col-sm-offset-3 col-md-6 checkbox">
                <label for="USER_REMEMBER">
                    <input type="checkbox"
                           id="USER_REMEMBER"
                           name="USER_REMEMBER"
                           value="Y">
                    &nbsp;<?=GetMessage("R_AUTH_REMEMBER_ME")?>
                </label>
            </div>
        </div>

        <div class="form-group clearfix">
            <div class="col-sm-9 col-sm-offset-3">
                <p>
                    <?/*= $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]; */ ?>
                    Пароль должен быть не менее 6 и не более 12 символов длиной.
                </p>
                <p><sup class="text-danger">*</sup> <?=GetMessage("R_AUTH_REQ")?></p>
            </div>
        </div>

    </form>
    <?
}

if (!CMain::IsHTTPS() && COption::GetOptionString('main', 'use_encrypted_auth', 'N') == 'Y') {
    $sec = new CRsaSecurity();
    if (($arKeys = $sec->LoadKeys())) {
        $sec->SetKeys($arKeys);
        $formid = 'lsiregform';

        if (!isset($_SESSION['__STORED_RSA_RAND'])) {
            $_SESSION['__STORED_RSA_RAND'] = $this->GetNewRsaRand();
        }

        $arSafeParams = array('REGISTER[PASSWORD]', 'REGISTER[CONFIRM_PASSWORD]');

        $arData = array(
            "formid" => $formid,
            "key" => $arKeys,
            "rsa_rand" => $_SESSION['__STORED_RSA_RAND'],
            "params" => $arSafeParams,
        );
        ?>
        <script type="text/javascript">
            function rsa_encode_lsiregform() {
                rsasec_form(<?=CUtil::PhpToJSObject($arData)?>);
            }
        </script>
        <?
    }
}
