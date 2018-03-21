<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);
?>

<div class="menu-line">
    <div class="container">
        <div class="catalog-control" data-catalog="close">Каталог товаров</div>
        <div class="menu">
            <bottom class="menu-bar menu__btn" type="button">
                <div class="menu-bar__icon"></div>
                <div class="menu-bar__icon"></div>
                <div class="menu-bar__icon"></div>
            </bottom>
            <?
            if (!empty($arResult)) {
                ?>
                <ul class="menu__list">
                    <?
                    foreach ($arResult as $arItem) {
                        if ($arItem["DEPTH_LEVEL"] > 1) {
                            continue;
                        }
                        ?>
                        <li class="menu__item"><a class="menu__link <? if ($arItem["SELECTED"]) { ?>active<? } ?>"
                                                  href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                        <?
                    }
                    ?>
                </ul>
                <?
            }
            ?>
        </div>
    </div>
</div>