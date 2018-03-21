<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);
?>


<div class="title-line">
    <div class="title-line__title">Видео</div>
    <a class="title-line__link" href="<?= \CComponentEngine::makePathFromTemplate($arResult["LIST_PAGE_URL"]) ?>">Все
        видео</a></div>
<div class="panel-block">
    <?
    foreach ($arResult["ITEMS"] as $arItem) {
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
            array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        if (!$arItem['PROPERTIES']['SRC']['VALUE']) {
            continue;
        }
        ?>
        <a class="video-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <img class="img-responsive" src="<?= $arItem['PROPERTIES']['SRC']['VALUE']['YOUTUBE']['COVER']['src'] ?>"
                 alt="<?= $arItem['NAME'] ?>"/>
        </a>
        <?
    }
    ?>
</div>