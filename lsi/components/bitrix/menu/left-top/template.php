<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);

if (!empty($arResult)) {
    ?>
    <ul class="section-tags">
        <?
        foreach ($arResult as $arItem) {
            if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) {
                continue;
            }
            ?>
            <li class="section-tags__item">
                <a class="section-tags__link <? if ($arItem["SELECTED"]) {
                    ?>section-tags__link_active<?
                } ?>" href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
            </li>
            <?
        }
        ?>
    </ul>
    <?
}
?>