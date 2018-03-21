<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<div class="buywith">
    <?
    if (file_exists($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/components/intervolga.custom/catalog.section/catalog-tile/" . basename(__FILE__))) {
        include $_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/components/intervolga.custom/catalog.section/catalog-tile/" . basename(__FILE__);
    }
    ?>
</div>
