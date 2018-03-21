<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Intervolga\Custom\Iblock\Offer;
use Intervolga\Migrato\Data\Module\Iblock\Iblock;
use Intervolga\Migrato\Data\Module\Iblock\Property;
use Intervolga\Migrato\Data\Module\Main\Group;
use Bitrix\Main\Application;
include "init.php";
?><!DOCTYPE html>
<!--[if lt IE 8]><html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="<?=LANGUAGE_ID?>"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9" lang="<?=LANGUAGE_ID?>"><![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10" lang="<?=LANGUAGE_ID?>"><![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="<?=LANGUAGE_ID?>">
<!--<![endif]-->

<head>
	<? $APPLICATION->ShowHead() ?>
	<title><? $APPLICATION->ShowTitle() ?></title>
</head>

<body>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<!--noindex--><noscript class="page__noscript">В вашем браузере отключен JavaScript. Многие элементы сайта могут работать некорректно.</noscript>
<!--[if lt IE 8]><div class="page__browsehappy">Вы используете <strong>устаревший</strong> браузер. Пожалуйста <a rel="nofollow" onclick="window.open(this.href, '_blank');return false;" href="http://browsehappy.com/">обновите свой браузер</a> чтобы улучшить взаимодействие с сайтом.</div><![endif]-->
<!--/noindex-->
<header class="header">
	<div class="container container_fluid_false">
		<div class="header__row">
			<div class="header__logo col-sm-2"><a class="a" href="<?=$APPLICATION->GetCurPage(false) !== '/' ? SITE_DIR : 'javascript:void(0)'?>"><i class="icomoon icon icon-logo"></i></a></div>
			<div class="header__inner">
				<nav class="nav-tools">
					<ul class="nav-tools__inner">
						<li class="nav-tools__li">Клуб клиентов ЕЭС-Гарант</li>
						<li class="nav-tools__li">
							<?$APPLICATION->IncludeComponent("intervolga.common:ajax.component", "proposals_ring_top", Array(
								"COMPONENT" => "bitrix:iblock.element.add.form",	// Компонент
								"COMPONENT_ID_REQUEST_NAME" => "AJAX_IID",	// Параметр GET
								"COMPONENT_SECTION_1" => "content",	// Раздел в дереве компонентов
								"COMPONENT_SECTION_2" => "iblock_element_add",	// Подраздел в дереве компонентов
								"COMPONENT_TEMPLATE" => "proposals_ring_top",
								"ID" => "ring_top",	// ID AJAX-компонента
								"INNER_CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",	// * дата начала *
								"INNER_CUSTOM_TITLE_DATE_ACTIVE_TO" => "",	// * дата завершения *
								"INNER_CUSTOM_TITLE_DETAIL_PICTURE" => "",	// * подробная картинка *
								"INNER_CUSTOM_TITLE_DETAIL_TEXT" => "",	// * подробный текст *
								"INNER_CUSTOM_TITLE_IBLOCK_SECTION" => "",	// * раздел инфоблока *
								"INNER_CUSTOM_TITLE_NAME" => "",	// * наименование *
								"INNER_CUSTOM_TITLE_PREVIEW_PICTURE" => "",	// * картинка анонса *
								"INNER_CUSTOM_TITLE_PREVIEW_TEXT" => "",	// * текст анонса *
								"INNER_CUSTOM_TITLE_TAGS" => "",	// * теги *
								"INNER_DEFAULT_INPUT_SIZE" => "30",	// Размер полей ввода
								"INNER_DETAIL_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования подробного текста
								"INNER_ELEMENT_ASSOC" => "CREATED_BY",	// Привязка к пользователю
								"INNER_GROUPS" => array(	// Группы пользователей, имеющие право на добавление/редактирование
									Group::GROUP_ALL_USERS
								),
								"INNER_IBLOCK_ID" => Iblock::getPublicId('proposals_ring'),	// Инфоблок
								"INNER_IBLOCK_TYPE" => "proposals",	// Тип инфоблока
								"INNER_LEVEL_LAST" => "Y",	// Разрешить добавление только на последний уровень рубрикатора
								"INNER_LIST_URL" => "?AJAX_IID=ring",	// Страница со списком своих элементов
								"INNER_MAX_FILE_SIZE" => "0",	// Максимальный размер загружаемых файлов, байт (0 - не ограничивать)
								"INNER_MAX_LEVELS" => "100000",	// Ограничить кол-во рубрик, в которые можно добавлять элемент
								"INNER_MAX_USER_ENTRIES" => "100000",	// Ограничить кол-во элементов для одного пользователя
								"INNER_PREVIEW_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования текста анонса
								"INNER_PROPERTY_CODES" => array(	// Свойства, выводимые на редактирование
									Property::getPublicId('proposals_ring.FIO'),
									Property::getPublicId('proposals_ring.PHONE'),
									Property::getPublicId('proposals_ring.EMAIL'),
									Property::getPublicId('proposals_ring.ORGANISATION'),
									Property::getPublicId('proposals_ring.THEME'),
									"NAME"
								),
								"INNER_PROPERTY_CODES_REQUIRED" => array(	// Свойства, обязательные для заполнения
									Property::getPublicId('proposals_ring.FIO'),
									Property::getPublicId('proposals_ring.PHONE'),
									Property::getPublicId('proposals_ring.EMAIL')
								),
								"INNER_RESIZE_IMAGES" => "N",	// Использовать настройки инфоблока для обработки изображений
								"INNER_SEF_FOLDER" => "",	// Каталог ЧПУ (относительно корня сайта)
								"INNER_SEF_MODE" => "N",	// Включить поддержку ЧПУ
								"INNER_STATUS" => "ANY",	// Редактирование возможно
								"INNER_STATUS_NEW" => "N",	// Деактивировать элемент
								"INNER_USER_MESSAGE_ADD" => "Ваша заявка успешно добавлена",	// Сообщение об успешном добавлении
								"INNER_USER_MESSAGE_EDIT" => "",	// Сообщение об успешном сохранении
								"INNER_USE_CAPTCHA" => "Y",	// Использовать CAPTCHA
								"SHOW_BUTTON" => "Y",	// Показывать кнопку для открытия формы
								"SIZE" => "",	// Размер всплывающего окна
								"TEMPLATE" => "main:custom",	// Шаблон компонента
								"TITLE" => "Заказать звонок",	// Заголовок всплывающего окна
							),
								false
							);?>
						</li>
						<li class="nav-tools__li">
							<?$APPLICATION->IncludeComponent(
								"bitrix:system.auth.form",
								"garant.auth",
								Array(
									"FORGOT_PASSWORD_URL" => "",
									"PROFILE_URL" => "/user/",
									"REGISTER_URL" => "",
									"SHOW_ERRORS" => "N"
								)
							);?>
						</li>
					</ul>
				</nav>
				<hr class="hr hidden-xs" />
				<?$APPLICATION->IncludeComponent(
					"bitrix:menu",
					"top_multi",
					Array(
						"ALLOW_MULTI_SELECT" => "N",
						"CHILD_MENU_TYPE" => "left",
						"DELAY" => "N",
						"MAX_LEVEL" => "2",
						"MENU_CACHE_GET_VARS" => array(0=>"",),
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_TYPE" => "N",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"ROOT_MENU_TYPE" => "top",
						"USE_EXT" => "N"
					)
				);?>
			</div>
		</div>
	</div>
</header>
<?if ($APPLICATION->GetCurPage(false) === '/'): ?>
<main class="main">
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"slider",
		array(
			"COMPONENT_TEMPLATE" => "slider",
			"IBLOCK_TYPE" => "content",
			"IBLOCK_ID" => Iblock::getPublicId('slider'),
			"NEWS_COUNT" => "20",
			"SORT_BY1" => "SORT",
			"SORT_ORDER1" => "ASC",
			"SORT_BY2" => "ID",
			"SORT_ORDER2" => "ASC",
			"FILTER_NAME" => "",
			"FIELD_CODE" => array(
				0 => "ID",
				1 => "NAME",
				2 => "DETAIL_PICTURE",
				3 => "DETAIL_TEXT",
				4 => "PREVIEW_PICTURE",
				5 => ""
			),
			"PROPERTY_CODE" => array(
				0 => "",
				1 => "",
			),
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"PREVIEW_TRUNCATE_LEN" => "",
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"SET_TITLE" => "N",
			"SET_BROWSER_TITLE" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_META_DESCRIPTION" => "N",
			"SET_LAST_MODIFIED" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"INCLUDE_SUBSECTIONS" => "N",
			"STRICT_SECTION_CHECK" => "N",
			"PAGER_TEMPLATE" => ".default",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => "Новости",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"SET_STATUS_404" => "N",
			"SHOW_404" => "N",
			"MESSAGE_404" => ""
		),
		false
	);?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:search.title",
		"main",
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
			"COMPONENT_TEMPLATE" => "main",
			"CATEGORY_0_iblock_catalog" => array(
				0 => "3",
				1 => "5",
			)
		),
		false
	);?>
	<div class="pattern pattern_type_dotted ptm pbx"></div>
	<?
	$GLOBALS['PARTNERS_FILTER'] = array(
		'PROPERTY_IS_PARTNER_OFFER' => 1
	);
	?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"partners",
		Array(
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"ADD_SECTIONS_CHAIN" => "N",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"CHECK_DATES" => "Y",
			"COMPONENT_TEMPLATE" => "partners",
			"DETAIL_URL" => "",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_TEXT",2=>"PREVIEW_PICTURE",3=>"",),
			"FILTER_NAME" => "PARTNERS_FILTER",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"IBLOCK_ID" => Offer::getIblockId(),
			"IBLOCK_TYPE" => "catalog",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"INCLUDE_SUBSECTIONS" => "Y",
			"MESSAGE_404" => "",
			"NEWS_COUNT" => "100",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Новости",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"PREVIEW_TRUNCATE_LEN" => "",
			"PROPERTY_CODE" => array(0=>"",1=>"",),
			"SET_BROWSER_TITLE" => "N",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "N",
			"SHOW_404" => "N",
			"SORT_BY1" => "SORT",
			"SORT_BY2" => "ID",
			"SORT_ORDER1" => "ASC",
			"SORT_ORDER2" => "ASC",
			"STRICT_SECTION_CHECK" => "N"
		)
	);?>
	<div class="main__up">
		<div class="main__up-inner">
			<div class="main__up-text">
				<div class="mal"><button class="btn btn-info btn-xs" type="submit"><i class="fa fa-2x fa-angle-up"></i></button></div>
			</div>
		</div>
	</div>
</main>
<div class="pattern pattern_type_accent pbl">
	<div class="container container_fluid_false">
		<h2 class="h"><a class="a" href="<?= GetMessage('CATALOG_MAIN_SECTIONS_LINK')?>"><?= GetMessage('CATALOG_MAIN_SECTIONS_TITLE')?></a></h2>
		<div class="sticky row">
			<?
			$request = Application::getInstance()->getContext()->getRequest();

			$sectionID = intval(htmlspecialchars($request->getQuery("SECTION_ID")));
			if (!$sectionID)
			{
				$sectionID = '';
			}

			?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section.list",
				"sections_main",
				array(
					"COMPONENT_TEMPLATE" => "sections_main",
					"IBLOCK_TYPE" => "catalog",
					"IBLOCK_ID" => Offer::getIblockId(),
					"SECTION_ID" => '',
					"SECTION_CODE" => "",
					"COUNT_ELEMENTS" => "Y",
					"TOP_DEPTH" => "2",
					"SECTION_FIELDS" => array(
						0 => "ID",
						1 => "NAME",
						2 => "",
					),
					"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"SECTION_URL" => "",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_GROUPS" => "Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"CURRENT_SECTION" => $sectionID
				),
				false
			);?>
			<div class="sticky__inner col-xs-12 col-sm-8 col-md-9">
				<?
				global $arrFilter;
				$arrFilter = array(
					array(
						'LOGIC' => 'OR',
						array('PROPERTY_ACCEPT_MODERATION' => 1),
						array('PROPERTY_COMMENT' => false),
					),
				);

				// Получить список уникальных городов для текущей страницы
				$arUniqCities = array();
				$arFilterOffers = array(
					'IBLOCK_ID' => Offer::getIblockId(),
					"INCLUDE_SUBSECTIONS" => 'Y',
					array(
						'LOGIC' => 'OR',
						array('PROPERTY_ACCEPT_MODERATION' => 1),
						array('PROPERTY_COMMENT' => false),
					),
				);

				if ($sectionID)
				{
					$arFilterOffers["SECTION_ID"] = $sectionID;
				}

				$dbResOffers = CIBlockElement::GetList(array(), $arFilterOffers, false, false, array('PROPERTY_CITY'));
				while($arOffer = $dbResOffers->GetNext())
				{
					if (!in_array($arUniqCities, $arOffer['PROPERTY_CITY_VALUE']))
					{
						$arUniqCities[] = $arOffer['PROPERTY_CITY_VALUE'];
					}
				}

				ob_start();
				$APPLICATION->IncludeComponent(
					"bitrix:catalog.smart.filter",
					"catalog",
					array(
						"COMPONENT_TEMPLATE" => "catalog",
						"IBLOCK_TYPE" => "catalog",
						"IBLOCK_ID" => Offer::getIblockId(),
						"SECTION_ID" => $sectionID ? $sectionID : '',
						"SECTION_CODE" => "",
						"FILTER_NAME" => "arrFilter",
						"SEF_MODE" => "N",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "36000000",
						"CACHE_GROUPS" => "Y",
						"SAVE_IN_SESSION" => "N",
						"PAGER_PARAMS_NAME" => "arrPager",
						"XML_EXPORT" => "N",
						"SECTION_TITLE" => "-",
						"SECTION_DESCRIPTION" => "-",
						"CITIES_LIST" => $arUniqCities
					),
					false
				);
				$filterResultOb = ob_get_clean();
				?>

				<?
				/**
				 * Панель сортировки (буферизация)
				 */
				ob_start();
				$arSort = $APPLICATION->IncludeComponent(
					"intervolga.custom:catalog.sort",
					"catalog",
					Array(
						"COOKIE" => "Y",
						"COOKIE_NAME_DIRECTION" => "sort_order",
						"COOKIE_NAME_FIELD" => "sort_by",
						"COOKIE_TTL" => "7948800",
						"FIELDS_NUM" => "2",
						"FIELD_1_CODE" => "TIMESTAMP_X",
						"FIELD_1_DEFAULT_DIRECTION" => "DESC",
						"FIELD_1_NAME" => "По дате",
						"FIELD_2_CODE" => "SHOW_COUNTER",
						"FIELD_2_DEFAULT_DIRECTION" => "DESC",
						"FIELD_2_NAME" => "По популярности",
						"VAR_DIRECTION" => "sort_order",
						"VAR_FIELD" => "sort_by"
					)
				);
				$resultOb = ob_get_clean();
				?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:catalog.section",
					"offers_main",
					array(
						"COMPONENT_TEMPLATE" => "offers_main",
						"IBLOCK_TYPE" => "catalog",
						"IBLOCK_ID" => Offer::getIblockId(),
						"SECTION_ID" => $sectionID,
						"SECTION_CODE" => "",
						"SECTION_USER_FIELDS" => array(
							0 => "",
							1 => "",
						),
						"FILTER_NAME" => "arrFilter",
						"INCLUDE_SUBSECTIONS" => "Y",
						"SHOW_ALL_WO_SECTION" => "Y",
						"ELEMENT_SORT_FIELD" => $arSort['FIELD'],
						"ELEMENT_SORT_ORDER" => $arSort['DIRECTION'],
						"ELEMENT_SORT_FIELD2" => "id",
						"ELEMENT_SORT_ORDER2" => "desc",
						"PAGE_ELEMENT_COUNT" => "5",
						"LINE_ELEMENT_COUNT" => "",
						"PROPERTY_CODE" => array(
							0 => "SHOW_ON_MAIN_PAGE",
							1 => "ADDITIONAL_DESCRIPTION",
							2 => "VIEWS_COUNT",
							3 => "COMPANY",
							4 => "",
						),
						"OFFERS_LIMIT" => "0",
						"BACKGROUND_IMAGE" => "-",
						"SECTION_URL" => "",
						"DETAIL_URL" => "",
						"SECTION_ID_VARIABLE" => "SECTION_ID",
						"SEF_MODE" => "N",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "36000000",
						"CACHE_GROUPS" => "Y",
						"SET_TITLE" => "N",
						"SET_BROWSER_TITLE" => "N",
						"BROWSER_TITLE" => "-",
						"SET_META_KEYWORDS" => "N",
						"META_KEYWORDS" => "-",
						"SET_META_DESCRIPTION" => "N",
						"META_DESCRIPTION" => "-",
						"SET_LAST_MODIFIED" => "N",
						"USE_MAIN_ELEMENT_SECTION" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"CACHE_FILTER" => "N",
						"ACTION_VARIABLE" => "action",
						"PRODUCT_ID_VARIABLE" => "id",
						"PRICE_CODE" => array(
						),
						"USE_PRICE_COUNT" => "N",
						"SHOW_PRICE_COUNT" => "1",
						"PRICE_VAT_INCLUDE" => "N",
						"BASKET_URL" => "/personal/basket.php",
						"USE_PRODUCT_QUANTITY" => "N",
						"PRODUCT_QUANTITY_VARIABLE" => "quantity",
						"ADD_PROPERTIES_TO_BASKET" => "N",
						"PRODUCT_PROPS_VARIABLE" => "prop",
						"PARTIAL_PRODUCT_PROPERTIES" => "N",
						"PRODUCT_PROPERTIES" => array(
						),
						"DISPLAY_COMPARE" => "N",
						"PAGER_TEMPLATE" => ".default",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"PAGER_TITLE" => "Товары",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"PAGER_BASE_LINK_ENABLE" => "N",
						"SET_STATUS_404" => "N",
						"SHOW_404" => "N",
						"MESSAGE_404" => "",
						"COMPATIBLE_MODE" => "Y",
						"DISABLE_INIT_JS_IN_COMPONENT" => "N",
						"SORT_STRING" => $resultOb,
						"FILTER_STRING" => $filterResultOb
					),
					false
				);?>
			</div>
		</div>
		<div class="pvl"></div>
	</div>
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"main",
		array(
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"ADD_SECTIONS_CHAIN" => "N",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "N",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"FIELD_CODE" => array(
				0 => "NAME",
				1 => "PREVIEW_TEXT",
				2 => "DETAIL_TEXT",
				3 => "",
			),
			"FILE_404" => "",
			"FILTER_NAME" => "",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"IBLOCK_ID" => Iblock::getPublicId('news'),
			"IBLOCK_TYPE" => "content",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"INCLUDE_SUBSECTIONS" => "N",
			"MESSAGE_404" => "",
			"NEWS_COUNT" => "3",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Новости",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"PREVIEW_TRUNCATE_LEN" => "",
			"PROPERTY_CODE" => array(
				0 => "",
				1 => "",
			),
			"SET_BROWSER_TITLE" => "N",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_STATUS_404" => "Y",
			"SET_TITLE" => "N",
			"SHOW_404" => "Y",
			"SORT_BY1" => "ACTIVE_FROM",
			"SORT_BY2" => "SORT",
			"SORT_ORDER1" => "DESC",
			"SORT_ORDER2" => "ASC",
			"STRICT_SECTION_CHECK" => "N",
			"COMPONENT_TEMPLATE" => "main"
		),
		false
	);?>
	<?else:?>
	<main class="main">
		<?if (INTERVOLGA_GARANT_USER_PERSONAL == 'Y'):?><div class="pattern pattern_type_accent pbl"><?endif;?>
			<div class="container container_fluid_false">
				<?$APPLICATION->IncludeComponent(
					"bitrix:breadcrumb",
					"main",
					Array(
						"PATH" => "",
						"SITE_ID" => "s1",
						"START_FROM" => "0"
					)
				);?>
				<h1 class="h<?if (INTERVOLGA_GARANT_USER_PERSONAL == 'Y'):?> pull-left<?endif;?>"><?$APPLICATION->ShowTitle(false)?></h1>
				<?if (INTERVOLGA_GARANT_USER_PERSONAL == 'Y'):?>
					<div class="clearfix">
						<?
						$APPLICATION->ShowViewContent('header-control-panel');
						?>
					</div>
				<?endif;?>
<?endif;?>