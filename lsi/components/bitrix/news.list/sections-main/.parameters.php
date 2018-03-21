<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"FILT_TITLE" => Array(
		"NAME" => "Название",
		"TYPE" => "STRING",
		"DEFAULT" => "Каталог",
        "PARENT" => "ADDITIONAL_SETTINGS",
	),

	"FILT_LINK" => Array(
		"NAME" => "Ссылка",
		"TYPE" => "STRING",
		"DEFAULT" => "/catalog/",
		"PARENT" => "ADDITIONAL_SETTINGS",
	),

	"FILT_LINK_TITLE" => Array(
		"NAME" => "Название ссылки",
		"TYPE" => "STRING",
		"DEFAULT" => "Весь каталог",
		"PARENT" => "ADDITIONAL_SETTINGS",
	),

	"SLIDER_TIME" => Array(
		"NAME" => "Скорость слайдера",
		"TYPE" => "STRING",
		"DEFAULT" => "4000",
		"PARENT" => "ADDITIONAL_SETTINGS",
	),
);
