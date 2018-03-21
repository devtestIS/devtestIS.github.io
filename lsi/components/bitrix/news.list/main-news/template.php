<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);
?>

<div class="title-line">
    <div class="title-line__title">Новости</div>
    <a class="title-line__link" href="<?= \CComponentEngine::makePathFromTemplate($arResult["LIST_PAGE_URL"]) ?>">Все
        новости</a></div>
<div class="panel-block">
    <div class="news-list">
        <?
        foreach ($arResult["ITEMS"] as $arItem) {
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

            if (empty($arItem["DETAIL_TEXT"])) {
                $arItem["DETAIL_PAGE_URL"]
                    = \CComponentEngine::makePathFromTemplate($arResult["LIST_PAGE_URL"]) . '#element' . $arItem['ID'];
            }
            ?>
            <div class="news-list__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <?if($arParams["SHOW_DATE"] == "Y"):?>
                    <div class="news-list__date"><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></div>
                <?endif;?>
                <a class="news-list__link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a>
            </div>
            <?
        }
        ?>
    </div>
</div>