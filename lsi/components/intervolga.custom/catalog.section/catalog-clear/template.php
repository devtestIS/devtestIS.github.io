<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

if ($arResult["DESCRIPTION"]) {
    $this->SetViewTarget('catalogDescription');
    echo $arResult["DESCRIPTION"];
    $this->EndViewTarget();
}