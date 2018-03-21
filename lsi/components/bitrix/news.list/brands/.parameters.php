<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arTemplateParameters["RESIZE_TYPE"] = array(
	"NAME" => "Тип сжатия изображения",
	"TYPE" => "LIST",
	"VALUES" => array(
		-1 => "Не сжимать",
		BX_RESIZE_IMAGE_EXACT => "Точное",
		BX_RESIZE_IMAGE_PROPORTIONAL => "Пропорциональное",
		BX_RESIZE_IMAGE_PROPORTIONAL_ALT => "Пропорциональное (верт)",
	),
	"REFRESH" => "Y",
);
$arTemplateParameters["WIDTH"] = array(
	"NAME" => "Ширина изображения",
);
$arTemplateParameters["HEIGHT"] = array(
	"NAME" => "Высота изображения",
);

if (!isset($arCurrentValues["RESIZE_TYPE"]) || $arCurrentValues["RESIZE_TYPE"] == -1)
{
	unset($arTemplateParameters["WIDTH"]);
	unset($arTemplateParameters["HEIGHT"]);
}