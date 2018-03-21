<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?use Intervolga\Migrato\Data\Module\Iblock\Iblock;?>
<?use Intervolga\Migrato\Data\Module\Iblock\Property;?>
<?use Intervolga\Migrato\Data\Module\Main\Group;?>
<?if ($APPLICATION->GetCurPage(false) !== '/' && !defined("DO_NOT_USE_MAIN")): ?>
		<div class="main__up">
			<div class="main__up-inner">
				<div class="main__up-text">
					<div class="mal"><button class="btn btn-info btn-xs" type="submit"><i class="fa fa-2x fa-angle-up"></i></button></div>
				</div>
			</div>
		</div>
	</main>
<?endif;?>
<footer class="footer">
	<?$APPLICATION->IncludeComponent(
		"bitrix:menu",
		"bottom",
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
	<div class="container container_fluid_false">
		<div class="footer__row">
			<div class="footer__col">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_RECURSIVE" => "Y",
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/copyright.php"
					)
				);?>
			</div>
			<div class="footer__col">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_RECURSIVE" => "Y",
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/address.php"
					)
				);?>
			</div>
		</div>
	</div>
	<hr class="hr" />
	<div class="container container_fluid_false">
		<div class="footer__row">
			<?$APPLICATION->IncludeComponent(
				"intervolga.common:ajax.component",
				"proposals_ring",
				array(
					"COMPONENT" => "bitrix:iblock.element.add.form",
					"COMPONENT_ID_REQUEST_NAME" => "AJAX_IID",
					"COMPONENT_SECTION_1" => "content",
					"COMPONENT_SECTION_2" => "iblock_element_add",
					"COMPONENT_TEMPLATE" => "proposals_ring",
					"ID" => "ring",
					"INNER_CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
					"INNER_CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
					"INNER_CUSTOM_TITLE_DETAIL_PICTURE" => "",
					"INNER_CUSTOM_TITLE_DETAIL_TEXT" => "",
					"INNER_CUSTOM_TITLE_IBLOCK_SECTION" => "",
					"INNER_CUSTOM_TITLE_NAME" => "",
					"INNER_CUSTOM_TITLE_PREVIEW_PICTURE" => "",
					"INNER_CUSTOM_TITLE_PREVIEW_TEXT" => "",
					"INNER_CUSTOM_TITLE_TAGS" => "",
					"INNER_DEFAULT_INPUT_SIZE" => "30",
					"INNER_DETAIL_TEXT_USE_HTML_EDITOR" => "N",
					"INNER_ELEMENT_ASSOC" => "CREATED_BY",
					"INNER_GROUPS" => array(
						Group::GROUP_ALL_USERS
					),
					"INNER_IBLOCK_ID" => Iblock::getPublicId('proposals_ring'),
					"INNER_IBLOCK_TYPE" => "proposals",
					"INNER_LEVEL_LAST" => "Y",
					"INNER_LIST_URL" => "?AJAX_IID=ring",
					"INNER_MAX_FILE_SIZE" => "0",
					"INNER_MAX_LEVELS" => "100000",
					"INNER_MAX_USER_ENTRIES" => "100000",
					"INNER_PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
					"INNER_PROPERTY_CODES" => array(
						Property::getPublicId('proposals_ring.FIO'),
						Property::getPublicId('proposals_ring.PHONE'),
						Property::getPublicId('proposals_ring.EMAIL'),
						Property::getPublicId('proposals_ring.ORGANISATION'),
						Property::getPublicId('proposals_ring.THEME'),
						"NAME"
					),
					"INNER_PROPERTY_CODES_REQUIRED" => array(
						Property::getPublicId('proposals_ring.FIO'),
						Property::getPublicId('proposals_ring.PHONE'),
						Property::getPublicId('proposals_ring.EMAIL')
					),
					"INNER_RESIZE_IMAGES" => "N",
					"INNER_SEF_FOLDER" => "",
					"INNER_SEF_MODE" => "N",
					"INNER_STATUS" => "ANY",
					"INNER_STATUS_NEW" => "N",
					"INNER_USER_MESSAGE_ADD" => "Ваша заявка успешно добавлена",
					"INNER_USER_MESSAGE_EDIT" => "",
					"INNER_USE_CAPTCHA" => "Y",
					"SHOW_BUTTON" => "Y",
					"SIZE" => "",
					"TEMPLATE" => "main:custom",
					"TITLE" => "Заказать звонок"
				),
				false
			);?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:iblock.element.add.form",
				"subscribe",
				Array(
					"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
					"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
					"CUSTOM_TITLE_DETAIL_PICTURE" => "",
					"CUSTOM_TITLE_DETAIL_TEXT" => "",
					"CUSTOM_TITLE_IBLOCK_SECTION" => "",
					"CUSTOM_TITLE_NAME" => "",
					"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
					"CUSTOM_TITLE_PREVIEW_TEXT" => "",
					"CUSTOM_TITLE_TAGS" => "",
					"DEFAULT_INPUT_SIZE" => "30",
					"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
					"ELEMENT_ASSOC" => "CREATED_BY",
					"GROUPS" => array(
						Group::GROUP_ALL_USERS
					),
					"IBLOCK_ID" => Iblock::getPublicId('proposals_subscribe'),
					"IBLOCK_TYPE" => "proposals",
					"LEVEL_LAST" => "Y",
					"LIST_URL" => "",
					"MAX_FILE_SIZE" => "0",
					"MAX_LEVELS" => "100000",
					"MAX_USER_ENTRIES" => "100000",
					"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
					"PROPERTY_CODES" => array(
						Property::getPublicId('proposals_subscribe.EMAIL'),
						"NAME"
					),
					"PROPERTY_CODES_REQUIRED" => array(
						Property::getPublicId('proposals_subscribe.EMAIL'),
						"NAME"
					),
					"RESIZE_IMAGES" => "N",
					"SEF_MODE" => "N",
					"STATUS" => "ANY",
					"STATUS_NEW" => "N",
					"USER_MESSAGE_ADD" => "Вы успешно подписались на рассылки Клуба Клиентов ЕЭС-Гарант",
					"USER_MESSAGE_EDIT" => "",
					"USE_CAPTCHA" => "N"
				)
			);?>
			<div class="footer__col">
				<?$APPLICATION->IncludeComponent(
					"intervolga.custom:soc.services",
					"",
					Array()
				);?>
			</div>
			<div class="footer__col">
				<div class="developer">
					<div class="mrs"><a <?= ($APPLICATION->GetCurPage(false) !== '/') ? 'rel="nofollow"' : ''?> class="a" href="https://www.intervolga.ru/" target="_blank">Разработка сайта —</a></div>
					<img class="img img_lazyload img-responsive lazyload" data-src="<?=SITE_TEMPLATE_PATH?>/images/iv-logo.png" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt=""/>
				</div>
			</div>
		</div>
	</div>
</footer>
<?$APPLICATION->ShowViewContent('after_body');?>
</body>
<?$APPLICATION->IncludeComponent(
	"intervolga.common:ajax.component",
	"proposals",
	Array(
		"COMPONENT" => "bitrix:iblock.element.add.form",
		"COMPONENT_ID_REQUEST_NAME" => "AJAX_IID",
		"COMPONENT_SECTION_1" => "content",
		"COMPONENT_SECTION_2" => "iblock_element_add",
		"ID" => "offers",
		"INNER_CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
		"INNER_CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
		"INNER_CUSTOM_TITLE_DETAIL_PICTURE" => "",
		"INNER_CUSTOM_TITLE_DETAIL_TEXT" => "",
		"INNER_CUSTOM_TITLE_IBLOCK_SECTION" => "",
		"INNER_CUSTOM_TITLE_NAME" => "",
		"INNER_CUSTOM_TITLE_PREVIEW_PICTURE" => "",
		"INNER_CUSTOM_TITLE_PREVIEW_TEXT" => "",
		"INNER_CUSTOM_TITLE_TAGS" => "",
		"INNER_DEFAULT_INPUT_SIZE" => "30",
		"INNER_DETAIL_TEXT_USE_HTML_EDITOR" => "N",
		"INNER_ELEMENT_ASSOC" => "CREATED_BY",
		"INNER_GROUPS" => array(
			Group::GROUP_ALL_USERS
		),
		"INNER_IBLOCK_ID" => Iblock::getPublicId('proposals_partners'),
		"INNER_IBLOCK_TYPE" => "proposals",
		"INNER_LEVEL_LAST" => "Y",
		"INNER_LIST_URL" => "/?AJAX_IID=offers",
		"INNER_MAX_FILE_SIZE" => "0",
		"INNER_MAX_LEVELS" => "100000",
		"INNER_MAX_USER_ENTRIES" => "100000",
		"INNER_PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
		"INNER_PROPERTY_CODES" => array(
			Property::getPublicId('proposals_partners.FIO'),
			Property::getPublicId('proposals_partners.PHONE'),
			Property::getPublicId('proposals_partners.EMAIL'),
			Property::getPublicId('proposals_partners.ORGANISATION'),
			Property::getPublicId('proposals_partners.OFFER_LINK'),
			"NAME"
		),
		"INNER_PROPERTY_CODES_REQUIRED" => array(
			Property::getPublicId('proposals_partners.FIO'),
			Property::getPublicId('proposals_partners.PHONE'),
			Property::getPublicId('proposals_partners.EMAIL'),
			Property::getPublicId('proposals_partners.ORGANISATION')
		),
		"INNER_RESIZE_IMAGES" => "N",
		"INNER_SEF_FOLDER" => "",
		"INNER_SEF_MODE" => "N",
		"INNER_STATUS" => "ANY",
		"INNER_STATUS_NEW" => "N",
		"INNER_USER_MESSAGE_ADD" => "Ваша заявка успешно добавлена",
		"INNER_USER_MESSAGE_EDIT" => "",
		"INNER_USE_CAPTCHA" => "Y",
		"SHOW_BUTTON" => "Y",
		"SIZE" => "",
		"TEMPLATE" => "main:custom",
		"TITLE" => "Получить предложение",
		"COMPONENT_TEMPLATE" => "proposals"
	)
);?>
<?$APPLICATION->IncludeComponent(
	"intervolga.common:ajax.component",
	"proposals",
	Array(
		"COMPONENT" => "bitrix:iblock.element.add.form",
		"COMPONENT_ID_REQUEST_NAME" => "AJAX_IID",
		"COMPONENT_SECTION_1" => "content",
		"COMPONENT_SECTION_2" => "iblock_element_add",
		"ID" => "club",
		"INNER_CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
		"INNER_CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
		"INNER_CUSTOM_TITLE_DETAIL_PICTURE" => "",
		"INNER_CUSTOM_TITLE_DETAIL_TEXT" => "",
		"INNER_CUSTOM_TITLE_IBLOCK_SECTION" => "",
		"INNER_CUSTOM_TITLE_NAME" => "",
		"INNER_CUSTOM_TITLE_PREVIEW_PICTURE" => "",
		"INNER_CUSTOM_TITLE_PREVIEW_TEXT" => "",
		"INNER_CUSTOM_TITLE_TAGS" => "",
		"INNER_DEFAULT_INPUT_SIZE" => "30",
		"INNER_DETAIL_TEXT_USE_HTML_EDITOR" => "N",
		"INNER_ELEMENT_ASSOC" => "CREATED_BY",
		"INNER_GROUPS" => array(
			Group::GROUP_ALL_USERS
		),
		"INNER_IBLOCK_ID" => Iblock::getPublicId('proposals_club'),
		"INNER_IBLOCK_TYPE" => "proposals",
		"INNER_LEVEL_LAST" => "Y",
		"INNER_LIST_URL" => "/?AJAX_IID=club",
		"INNER_MAX_FILE_SIZE" => "0",
		"INNER_MAX_LEVELS" => "100000",
		"INNER_MAX_USER_ENTRIES" => "100000",
		"INNER_PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
		"INNER_PROPERTY_CODES" => array(
			Property::getPublicId('proposals_club.FIO'),
			Property::getPublicId('proposals_club.PHONE'),
			Property::getPublicId('proposals_club.EMAIL'),
			Property::getPublicId('proposals_club.ORGANISATION'),
			Property::getPublicId('proposals_club.COMPANY_INN'),
			"NAME"
		),
		"INNER_PROPERTY_CODES_REQUIRED" => array(
			Property::getPublicId('proposals_club.FIO'),
			Property::getPublicId('proposals_club.PHONE'),
			Property::getPublicId('proposals_club.EMAIL'),
			Property::getPublicId('proposals_club.ORGANISATION'),
			Property::getPublicId('proposals_club.COMPANY_INN')
		),
		"INNER_RESIZE_IMAGES" => "N",
		"INNER_SEF_FOLDER" => "",
		"INNER_SEF_MODE" => "N",
		"INNER_STATUS" => "ANY",
		"INNER_STATUS_NEW" => "N",
		"INNER_USER_MESSAGE_ADD" => "Ваша заявка успешно добавлена",
		"INNER_USER_MESSAGE_EDIT" => "",
		"INNER_USE_CAPTCHA" => "Y",
		"SHOW_BUTTON" => "Y",
		"SIZE" => "",
		"TEMPLATE" => "main:custom",
		"TITLE" => "Вступить в клуб",
		"COMPONENT_TEMPLATE" => "proposals"
	)
);?>
</html>