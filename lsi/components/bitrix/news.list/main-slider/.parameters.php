<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"DISPLAY_DATE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_DATE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
        "PARENT" => "ADDITIONAL_SETTINGS",
	),
	"DISPLAY_NAME" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_NAME"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
        "PARENT" => "ADDITIONAL_SETTINGS",
	),
	"DISPLAY_PICTURE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_PICTURE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
        "PARENT" => "ADDITIONAL_SETTINGS",
	),
	"DISPLAY_PREVIEW_TEXT" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_TEXT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
        "PARENT" => "ADDITIONAL_SETTINGS",
	),
);


$arTemplateParameters["RESIZE_PREVIEW_PICT"] = Array(
    "NAME" => GetMessage("RESIZE_PREVIEW_PICT"),
    "TYPE" => "CHECKBOX",
    "MULTIPLE" => "N",
    "VALUE" => "N",
    "DEFAULT" =>"N",
    "REFRESH"=> "Y",
    "PARENT" => "ADDITIONAL_SETTINGS",
);

if ($arCurrentValues["RESIZE_PREVIEW_PICT"] == "Y") {

    $arTemplateParameters["PREVIEW_PICT_W"] = array(
        "NAME" => GetMessage("PREVIEW_PICT_W"),
        "TYPE" => "STRING",
        "DEFAULT" => "270",
        "PARENT" => "ADDITIONAL_SETTINGS",
    );

    $arTemplateParameters["PREVIEW_PICT_H"] = array(
        "NAME" => GetMessage("PREVIEW_PICT_H"),
        "TYPE" => "STRING",
        "DEFAULT" => "",
        "PARENT" => "ADDITIONAL_SETTINGS",
    );

    $arTemplateParameters["PREVIEW_PICT_RES_TYPE"] = array(
        "NAME" => GetMessage("PREVIEW_PICT_RES_TYPE"),
        "TYPE" => "LIST",
        "VALUES" => Array(
            "BX_RESIZE_IMAGE_PROPORTIONAL" => GetMessage("BX_RESIZE_IMAGE_PROPORTIONAL_DESC"),
            "BX_RESIZE_IMAGE_PROPORTIONAL_ALT" => GetMessage("BX_RESIZE_IMAGE_PROPORTIONAL_ALT_DESC"),
            "BX_RESIZE_IMAGE_EXACT" => GetMessage("BX_RESIZE_IMAGE_EXACT_DESC"),
        ),
        "PARENT" => "ADDITIONAL_SETTINGS",
    );
}
?>
