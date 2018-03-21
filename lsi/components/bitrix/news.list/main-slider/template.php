<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);
?>

<div class="slider">
    <?
    foreach ($arResult["ITEMS"] as $arItem){
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
        array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    if ($arItem["PROPERTIES"]["LINK"]["VALUE"]){
    ?><a class="slider__item" href="<?= $arItem["PROPERTIES"]["LINK"]["VALUE"] ?>"
         id="<?= $this->GetEditAreaId($arItem['ID']); ?>"><?
        }else{
        ?>
        <div class="slider__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>"><?
            }
            ?>
            <img class="slider__img img-responsive"
                 src="<?= $arItem["PREVIEW_PICTURE_SMALL"]["src"] ?>"
                 alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                 title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"/>
        <?
        if ($arItem["PROPERTIES"]["LINK"]["VALUE"]){
        ?></a><?
    }else{
    ?></div><?
}
}
?>
</div>
