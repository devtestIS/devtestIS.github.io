<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
foreach($arResult["ITEMS"] as $arItem){
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="article-preview<? if($arParams['DISPLAY_DATE']=='Y') { ?> article-preview_date<? } ?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <?
        if($arParams['DISPLAY_DATE']=='Y') {
            ?>
            <div class="article-preview__date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
            <?
        }
        ?>
        <a name="element<?=$arItem['ID']?>"></a>
        <?
        if($arParams['HIDE_LINK_WHEN_NO_DETAIL'] && !$arItem['DETAIL_TEXT']){
            ?><span class="article-preview__title"><?=$arItem["NAME"]?></span><?
        }else{
            ?><a class="article-preview__title" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a><?
        }
        ?>
        <div class="article-preview__content">
            <?
            if($arItem["PREVIEW_PICTURE_SMALL"]){
                ?>
                <img class="img-responsive article-preview__img"
                     src="<?=$arItem["PREVIEW_PICTURE_SMALL"]['src']?>"
                     alt="<?=$arItem["PREVIEW_PICTURE_SMALL"]?>" />
                <?
            }
            ?>
            <?=$arItem["PREVIEW_TEXT"]?>
        </div>
    </div>
    <?
}
if ($arParams["DISPLAY_BOTTOM_PAGER"]) {
    echo $arResult["NAV_STRING"];
}
?>