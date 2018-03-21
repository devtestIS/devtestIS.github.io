<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);

if (!empty($arResult)) {
    ?>
    <ul class="menu-page">
        <?
        foreach ($arResult as $arItem) {
            if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) {
                continue;
            }
            ?>
            <li class="menu-page__item">
                <a class="menu-page__link <? if ($arItem["SELECTED"]) {
                    ?>active<?
                } ?>" href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
            </li>
            <?
        }
        ?>
    </ul>
    <?
}
?>