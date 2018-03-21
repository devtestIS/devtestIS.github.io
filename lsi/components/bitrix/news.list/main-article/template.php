<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);
?>

<div class="title-line">
    <div class="title-line__title">Статьи</div>
    <a class="title-line__link" href="<?= \CComponentEngine::makePathFromTemplate($arResult["LIST_PAGE_URL"]) ?>">Все
        статьи</a></div>
<div class="panel-block">
    <div class="article-list">
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
            <a class="article-list__item" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"
               id="<?= $this->GetEditAreaId($arItem['ID']); ?>"><?= $arItem["NAME"] ?></a>
            <?
        }
        ?>
    </div>
</div>