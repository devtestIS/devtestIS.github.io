<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arTemplateParameters["BIG_RESIZE_TYPE"] = array(
	"NAME" => "Тип сжатия фотографий (полноэкранный режим)",
	"TYPE" => "LIST",
	"VALUES" => array(
		-1 => "Не сжимать",
		BX_RESIZE_IMAGE_EXACT => "Точное",
		BX_RESIZE_IMAGE_PROPORTIONAL => "Пропорциональное",
		BX_RESIZE_IMAGE_PROPORTIONAL_ALT => "Пропорциональное (верт)",
	),
	"REFRESH" => "Y",
);
$arTemplateParameters["BIG_WIDTH"] = array(
	"NAME" => "Ширина фотографий (полноэкранный режим)",
);
$arTemplateParameters["BIG_HEIGHT"] = array(
	"NAME" => "Высота фотографий (полноэкранный режим)",
);

if (!isset($arCurrentValues["BIG_RESIZE_TYPE"]) || $arCurrentValues["BIG_RESIZE_TYPE"] == -1)
{
	unset($arTemplateParameters["BIG_WIDTH"]);
	unset($arTemplateParameters["BIG_HEIGHT"]);
}

$arTemplateParameters["SMALL_RESIZE_TYPE"] = array(
	"NAME" => "Тип сжатия фотографий (миниатюра)",
	"TYPE" => "LIST",
	"VALUES" => array(
		-1 => "Не сжимать",
		BX_RESIZE_IMAGE_EXACT => "Точное",
		BX_RESIZE_IMAGE_PROPORTIONAL => "Пропорциональное",
		BX_RESIZE_IMAGE_PROPORTIONAL_ALT => "Пропорциональное (верт)",
	),
	"REFRESH" => "Y",
);
$arTemplateParameters["SMALL_WIDTH"] = array(
	"NAME" => "Ширина фотографий (миниатюра)",
);
$arTemplateParameters["SMALL_HEIGHT"] = array(
	"NAME" => "Высота фотографий (миниатюра)",
);

if (!isset($arCurrentValues["SMALL_RESIZE_TYPE"]) || $arCurrentValues["SMALL_RESIZE_TYPE"] == -1)
{
	unset($arTemplateParameters["SMALL_WIDTH"]);
	unset($arTemplateParameters["SMALL_HEIGHT"]);
}