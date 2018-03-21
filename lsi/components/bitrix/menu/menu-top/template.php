<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);

if (!empty($arResult)) {
    ?>
    <div class="menu-top">
    <bottom class="menu-bar menu-top__btn" type="button">
        <div class="menu-bar__icon"></div>
        <div class="menu-bar__icon"></div>
        <div class="menu-bar__icon"></div>
    </bottom>
    <div class="menu-top__wrap">
        <?
        $previousLevel = 0;
        foreach ($arResult as $arItem){
        if ($arItem["DEPTH_LEVEL"] > 2) {
            continue;
        }

        if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel) {
            echo str_repeat("</ul></div>", ($previousLevel - $arItem["DEPTH_LEVEL"]));
        }

        if ($arItem["IS_PARENT"]){
        if ($arItem["DEPTH_LEVEL"] == 1){
        ?>
        <div class="menu-top__item dropdown">
            <a class="menu-top__link" href="javascript:void(0);" data-toggle="dropdown"><?= $arItem["TEXT"] ?> </a>
            <ul class="dropdown-menu dropdown-menu_ul">
                <?
                } elseif ($arItem["PERMISSION"] > "D") {
                    ?>
                    <li class="dropdown-menu__li"><a class="dropdown-menu__link"
                                                     href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                    <?
                }
                } else {
                    if ($arItem["PERMISSION"] > "D") {
                        if ($arItem["DEPTH_LEVEL"] == 1) {
                            ?>
                            <div class="menu-top__item">
                                <a class="menu-top__link" href="javascript:void(0);"
                                   data-toggle="dropdown"><?= $arItem["TEXT"] ?> </a>
                            </div>
                            <?
                        } else {
                            ?>
                            <li class="dropdown-menu__li"><a class="dropdown-menu__link"
                                                             href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                            </li>
                            <?
                        }
                    }
                }
                $previousLevel = $arItem["DEPTH_LEVEL"];
                }
                if ($previousLevel > 1) {//close last item tags
                    echo str_repeat("</ul></div>", ($previousLevel - 1));
                }
                ?>
        </div>
    </div>
    <?
}
?>