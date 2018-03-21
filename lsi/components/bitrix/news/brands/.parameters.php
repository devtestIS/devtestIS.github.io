<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arTemplateParameters["LIST_RESIZE_TYPE"] = array(
	"NAME" => "Тип сжатия изображения (в списке)",
	"TYPE" => "LIST",
	"VALUES" => array(
		-1 => "Не сжимать",
		BX_RESIZE_IMAGE_EXACT => "Точное",
		BX_RESIZE_IMAGE_PROPORTIONAL => "Пропорциональное",
		BX_RESIZE_IMAGE_PROPORTIONAL_ALT => "Пропорциональное (верт)",
	),
	"REFRESH" => "Y",
);
$arTemplateParameters["LIST_WIDTH"] = array(
	"NAME" => "Ширина изображения (в списке)",
);
$arTemplateParameters["LIST_HEIGHT"] = array(
	"NAME" => "Высота изображения (в списке)",
);

if (!isset($arCurrentValues["LIST_RESIZE_TYPE"]) || $arCurrentValues["LIST_RESIZE_TYPE"] == -1)
{
	unset($arTemplateParameters["LIST_WIDTH"]);
	unset($arTemplateParameters["LIST_HEIGHT"]);
}

$arTemplateParameters["DETAIL_RESIZE_TYPE"] = array(
	"NAME" => "Тип сжатия изображения (на детальной странице)",
	"TYPE" => "LIST",
	"VALUES" => array(
		-1 => "Не сжимать",
		BX_RESIZE_IMAGE_EXACT => "Точное",
		BX_RESIZE_IMAGE_PROPORTIONAL => "Пропорциональное",
		BX_RESIZE_IMAGE_PROPORTIONAL_ALT => "Пропорциональное (верт)",
	),
	"REFRESH" => "Y",
);
$arTemplateParameters["DETAIL_WIDTH"] = array(
	"NAME" => "Ширина изображения (на детальной странице)",
);
$arTemplateParameters["DETAIL_HEIGHT"] = array(
	"NAME" => "Высота изображения (на детальной странице)",
);

if (!isset($arCurrentValues["DETAIL_RESIZE_TYPE"]) || $arCurrentValues["DETAIL_RESIZE_TYPE"] == -1)
{
	unset($arTemplateParameters["DETAIL_WIDTH"]);
	unset($arTemplateParameters["DETAIL_HEIGHT"]);
}
$arTemplateParameters["SMART_FILTER_NAME"] = array(
	"NAME" => "Имя умного фильтра в каталоге",
);