<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

global $APPLICATION, $USER;
?>
<div class="information__content">
    <?
    if (\Intervolga\Custom\City::currentIsDefault() || $USER->IsAdmin()) {
        if ($USER->IsAdmin()) {
            ?>
            <div class="h3 text-danger">Включаемая область для Уфы:</div><?
        }
        $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO",
                "EDIT_TEMPLATE" => "",
                "PATH" => SITE_TEMPLATE_PATH . '/include/' . $fileInclude . '_ufa.php'
            )
        );
    }
    if (!\Intervolga\Custom\City::currentIsDefault() || $USER->IsAdmin()) {
        if ($USER->IsAdmin()) {
            ?>
            <div class="h3 text-danger">Включаемая область для остальных городов:</div><?
        }
        $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO",
                "EDIT_TEMPLATE" => "",
                "PATH" => SITE_TEMPLATE_PATH . '/include/' . $fileInclude . '_other.php'
            )
        );
    }
    ?>
</div>
