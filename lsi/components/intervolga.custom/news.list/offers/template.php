<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if ($arParams['NO_WRAP'] != 'Y') {
    ?><div class="row mbl"><?
}
if (($arParams['DISPLAY_BOTTOM_PAGER'] || $arParams['DISPLAY_TOP_PAGER']) && $arParams['AJAX_ACTION'] != 'nextPage') {
    if ($arResult["NAV_RESULT"]->NavPageNomer > 1) {
        echo $arResult['NAV_STRING_BEFORE'];
    }
}
foreach($arResult["ITEMS"] as $arItem){
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="col-md-12">
    <a class="article-preview article-preview_date" href="<?=$arItem["DETAIL_PAGE_URL"]?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="article-preview__title"><?=$arItem["NAME"]?></div>
        <div class="article-preview__content">
            <div class="row">
                <?
                if($arItem["PREVIEW_PICTURE_SMALL"]){
                    ?>
                    <div class="col-md-<?= $arItem["PREVIEW_TEXT"]? 6: 12?> col-sm-12">
                        <img class="img-responsive"
                             src="<?=$arItem["PREVIEW_PICTURE_SMALL"]['SRC']?>"
                             alt="<?=$arItem["PREVIEW_PICTURE_SMALL"]['ALT']?>"
                             title="<?=$arItem["PREVIEW_PICTURE_SMALL"]['TITLE']?>"/>
                    </div>
                    <?
                }
                ?>
                <?if(!empty($arItem["PREVIEW_TEXT"])):?>
                    <div class="col-md-<?= $arItem["PREVIEW_PICTURE_SMALL"]? 6: 12?> col-sm-12">
                        <?=$arItem["PREVIEW_TEXT"]?>
                    </div>
                <?endif?>
            </div>
            <?if($arParams['DISPLAY_DATE']=='Y' && (!empty($arItem["DATE_ACTIVE_FROM_FORMATED"]) || !empty($arItem["DATE_ACTIVE_TO_FORMATED"]))):?>
                <div class="mtm article-date-adaptive clearfix">
                    <div class="pull-left">
                        <div class="pull-left prm">Период действия: </div>
                        <div class="clearfix visible-xs visible-sm"></div>
                        <b class="article-date mtn"><?= !empty($arItem["DATE_ACTIVE_FROM_FORMATED"])?"от ".$arItem["DATE_ACTIVE_FROM_FORMATED"] : ""?> <?= !empty($arItem["DATE_ACTIVE_TO_FORMATED"])?"до ".$arItem["DATE_ACTIVE_TO_FORMATED"] : ""?></b>
                    </div>
                </div>
            <?endif;?>
        </div>
    </a>
    </div>
    <?
}
if (($arParams['DISPLAY_BOTTOM_PAGER'] || $arParams['DISPLAY_TOP_PAGER']) && $arParams['AJAX_ACTION'] != 'prevPage') {
    if ($arResult["NAV_RESULT"]->NavPageNomer <= $arResult["NAV_RESULT"]->NavPageCount) {
        echo $arResult['NAV_STRING_AFTER'];
    }
}
if ($arParams['NO_WRAP'] != 'Y') {
    ?></div><?
}
?>