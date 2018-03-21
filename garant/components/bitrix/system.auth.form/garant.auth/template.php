<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var array $arParams
 * @var array $arResult
 */
use Bitrix\Main\Localization\Loc;
global $USER;
?>
<?if($arResult["FORM_TYPE"] == "login"):?>
    <a class="a" href="<?= $arParams["PROFILE_URL"]?>"><i class="icomoon mrs icon icon-user"></i><span class="span hidden-ex"><?= Loc::getMessage('AUTH_PROFILE_URL')?></span></a>
<?elseif($USER->IsAuthorized()):?>
    <? ob_start() ?>
    <form action="<?=$arResult["AUTH_URL"]?>">
        <?foreach ($arResult["GET"] as $key => $value):?>
            <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
        <?endforeach?>
        <input type="hidden" name="logout" value="yes" />
        <input class="btn btn-sm btn-default" type="submit" name="logout_butt" value="<?= Loc::getMessage("AUTH_LOGOUT_BUTTON")?>" />
    </form>
    <? $data = preg_replace('/"/', "'", ob_get_clean()) ?>
    <a class="a"
       href="<?= $arParams["PROFILE_URL"]?>"
       tabindex="0"
       data-toggle="popover"
       data-placement="bottom"
       data-trigger="hover"
       role="button"
       data-html="true"
       data-delay='{"hide": 1000 }'
       data-content="<?= $data?>">
        <i class="icomoon mrs icon icon-user"></i>
        <span class="span hidden-ex"><?= $arResult["USER_NAME"]?></span>
    </a>
<?endif?>



