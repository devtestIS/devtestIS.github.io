<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);
?>

<div class="title-line">
    <div class="title-line__title">Бренды</div>
    <a class="title-line__link" href="<?= \CComponentEngine::makePathFromTemplate($arResult["LIST_PAGE_URL"]) ?>">Посмотреть
        все бренды</a>
</div>
<div class="slider-brand">
    <?
    foreach ($arResult["ITEMS"] as $arItem) {
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
            array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <a class="slider-brand__item" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"
           id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <img class="img"
                 src="<?= $arItem["PREVIEW_PICTURE_SMALL"]["SRC"] ?>"
                 alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                 title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"/>
        </a>
        <?
    }
    ?>
</div>