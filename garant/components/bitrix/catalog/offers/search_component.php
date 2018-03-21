<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?$APPLICATION->IncludeComponent(
	"bitrix:search.title",
	"catalog",
	array(
		"CATEGORY_0" => array(
			0 => "iblock_catalog",
		),
		"CATEGORY_0_TITLE" => "",
		"CHECK_DATES" => "N",
		"CONTAINER_ID" => "title-search",
		"INPUT_ID" => "title-search-input",
		"NUM_CATEGORIES" => "1",
		"ORDER" => "date",
		"PAGE" => "#SITE_DIR#search/",
		"SHOW_INPUT" => "Y",
		"SHOW_OTHERS" => "N",
		"TOP_COUNT" => "5",
		"USE_LANGUAGE_GUESS" => "Y",
		"COMPONENT_TEMPLATE" => "catalog",
		"CATEGORY_0_iblock_catalog" => array(
			0 => "3",
			1 => "5",
		)
	),
	false
);?>