<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? use Intervolga\Custom\SiteTools; ?>

<? $APPLICATION->AddBufferContent("viewLeftMenu"); ?>

</div>

<? $APPLICATION->ShowViewContent("catalogRecommendation"); ?>

<?
if(SiteTools::isInSection('catalog/*') && !isset($GLOBALS["CATALOG_CURRENT_ELEMENT_ID"])) {
	$APPLICATION->AddBufferContent("wrapCatalogEnd");
	$APPLICATION->AddBufferContent("catalogDescription");
}
?>

<?
if(SiteTools::isInSection(
	array(
		'search/*',
		'new/*',
		'actions/*',
		'our-choice/*',
		'catalog/*'
	)
) || SiteTools::isIndex()){
	if (!CSite::InDir("/catalog/compare/"))
	{
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.viewed.products",
			"viewed",
			Array(
				"ACTION_VARIABLE" => "action_cvp",
				"ADDITIONAL_PICT_PROP_" . IBLOCK_ID_CATALOG => "MORE_PHOTO",
				"ADD_PROPERTIES_TO_BASKET" => "Y",
				"BASKET_URL" => "/personal/basket.php",
				"CACHE_GROUPS" => "N",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "N",
				"CART_PROPERTIES_" . IBLOCK_ID_CATALOG => array("", ""),
				"CONVERT_CURRENCY" => "Y",
				"CURRENCY_ID" => "RUB",
				"DEPTH" => "",
				"DETAIL_URL" => "",
				"HIDE_NOT_AVAILABLE" => "N",
				"IBLOCK_ID" => IBLOCK_ID_CATALOG,
				"IBLOCK_TYPE" => IBLOCK_TYPE_CATALOG,
				"LABEL_PROP_" . IBLOCK_ID_CATALOG => "-",
				"LINE_ELEMENT_COUNT" => "3",
				"MESS_BTN_BUY" => "Купить",
				"MESS_BTN_DETAIL" => "Подробнее",
				"MESS_BTN_SUBSCRIBE" => "Подписаться",
				"PAGE_ELEMENT_COUNT" => "4",
				"PARTIAL_PRODUCT_PROPERTIES" => "Y",
				"PRICE_CODE" => \Intervolga\Custom\Product::getAllPriceCode(),
				"PRICE_VAT_INCLUDE" => "Y",
				"PRODUCT_ID_VARIABLE" => "id",
				"PRODUCT_PROPS_VARIABLE" => "prop",
				"PRODUCT_QUANTITY_VARIABLE" => "",
				"PRODUCT_SUBSCRIPTION" => "Y",
				"PROPERTY_CODE_" . IBLOCK_ID_CATALOG => array("*"),
				"SECTION_CODE" => "",
				"SECTION_ELEMENT_CODE" => "",
				"SECTION_ELEMENT_ID" => $GLOBALS['CATALOG_CURRENT_ELEMENT_ID'],
				"SECTION_ID" => "",
				"SHOW_DISCOUNT_PERCENT" => "Y",
				"SHOW_FROM_SECTION" => "N",
				"SHOW_IMAGE" => "Y",
				"SHOW_NAME" => "Y",
				"SHOW_OLD_PRICE" => "Y",
				"SHOW_PRICE_COUNT" => "1",
				"SHOW_PRODUCTS_" . IBLOCK_ID_CATALOG => "Y",
				"TEMPLATE_THEME" => "blue",
				"USE_PRODUCT_QUANTITY" => "Y"
			),
			NULL,
			array('HIDE_ICONS' => 'Y')
		);
	}
}
?>

<?
if(SiteTools::isInSection('catalog/*') && !isset($GLOBALS["CATALOG_CURRENT_ELEMENT_ID"])) {
	?>
	<div class="container">
		<div class="article">
			<div class="h2">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => SITE_TEMPLATE_PATH . '/include/catalog_footer_phone.php'
					)
				);?>
			</div>
		</div>
	</div>
	<?
}
?>

<div class="footer">
	<div class="container">
		<div class="row row_clean-sm_2">
			<?$APPLICATION->IncludeComponent(
				"bitrix:menu",
				"footer",
				Array(
					"ALLOW_MULTI_SELECT" => "N",
					"CHILD_MENU_TYPE" => "left",
					"DELAY" => "N",
					"MAX_LEVEL" => "2",
					"MENU_CACHE_GET_VARS" => array(""),
					"MENU_CACHE_TIME" => "3600",
					"MENU_CACHE_TYPE" => "N",
					"MENU_CACHE_USE_GROUPS" => "N",
					"ROOT_MENU_TYPE" => "top",
					"USE_EXT" => "Y",
					"CACHE_SELECTED_ITEMS" => "N"
				)
			);?>
			<div class="col-md-3 col-sm-6">
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"footer-soc",
					Array(
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"ADD_SECTIONS_CHAIN" => "N",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "N",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"CACHE_TIME" => "36000000",
						"CACHE_TYPE" => "A",
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"DISPLAY_TOP_PAGER" => "N",
						"FIELD_CODE" => array("NAME", "SORT", "PREVIEW_PICTURE", ""),
						"FILTER_NAME" => "",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"IBLOCK_ID" => IBLOCK_ID_SOC_SERV,
						"IBLOCK_TYPE" => "content",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"INCLUDE_SUBSECTIONS" => "Y",
						"MESSAGE_404" => "",
						"NEWS_COUNT" => "10",
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
						"PROPERTY_CODE" => array("LINK", ""),
						"SET_BROWSER_TITLE" => "N",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "N",
						"SET_META_KEYWORDS" => "N",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "N",
						"SHOW_404" => "N",
						"SORT_BY1" => "ACTIVE_FROM",
						"SORT_BY2" => "SORT",
						"SORT_ORDER1" => "DESC",
						"SORT_ORDER2" => "ASC"
					),
					NULL,
					array('HIDE_ICONS' => 'Y')
				);?>
				<div class="footer-title">Электронная почта для заказов</div>
				<div><?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_TEMPLATE_PATH . '/include/footer_email.php',
							"CACHE_SELECTED_ITEMS" => "N"
						)
					);?></div>

				<? if(!SiteTools::isInSection('subscribe')) { ?>
					<?$APPLICATION->IncludeComponent(
						"bitrix:sender.subscribe",
						"footer",
						Array(
							"AJAX_MODE" => "Y",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "N",
							"CACHE_TIME" => "3600",
							"CACHE_TYPE" => "A",
							"CONFIRMATION" => "Y",
							"SET_TITLE" => "N",
							"SHOW_HIDDEN" => "N",
							"USE_PERSONALIZATION" => "N"
						)
					);?>
				<? } ?>
			</div>

		</div>

		<div class="footer-info">
			<div class="row">
				<div class="col-md-10">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_TEMPLATE_PATH . '/include/footer_info.php',
							"CACHE_SELECTED_ITEMS" => "N"
						)
					);?>
				</div>
				<div class="col-md-2">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_TEMPLATE_PATH . '/include/footer_ya.php',
							"CACHE_SELECTED_ITEMS" => "N"
						)
					);?>
				</div>
			</div>
		</div>
	</div>
	<div class="footer__bottom">
		<div class="container">
			<div class="copyright">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => SITE_TEMPLATE_PATH . '/include/footer_copyright.php'
					)
				);?>
			</div>
			<div class="footer-iv">
				<? $bIsIndex = Intervolga\Custom\SiteTools::isIndex(); ?>
				<? if (!$bIsIndex): ?>
					<!--noindex-->
				<? endif ?>
				<a class="link footer-iv__link" href="http://www.intervolga.ru/" <? if (!$bIsIndex): ?>rel="nofollow"<? endif ?> target="_blank">Разработка сайта</a> — ИНТЕРВОЛГА
				<? if (!$bIsIndex): ?>
					<!--/noindex-->
				<? endif ?>
			</div>
			<div class="text-center" id="bx-composite-banner"></div>
		</div>
	</div>
	<div class="to-up"><a class="to-up__link" href="#"><i class="fa fa-angle-up to-up__icon"></i></a></div>
</div>

<? $APPLICATION->AddBufferContent(array('Intervolga\Custom\SiteTools', 'viewModals')); ?>

<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="modalAuth">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Ошибка</h4>
			</div>
			<div class="modal-body clearfix">
				<i class="fa fa-exclamation-circle fa-5x text-danger pull-left" aria-hidden="true"></i>
				<div class="messages">Ошибка</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">OK</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="modalEr">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal__title">Сообщить об ошибке на странице</div>
				<div class="modal__close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></div>
			</div>
			<form>
				<div class="modal-body clearfix">
					<div style="display: none" class="alert alert-danger" data-error-zone></div>
					<div class="alert alert-success" data-success-zone style="display: none">Сообщение успешно отпралено</div>
					<input type="hidden" title="url" name="url" value="<?=$APPLICATION->GetCurPage()?>">
					<label>Текст сообщения<sup class="text-danger">*</sup></label>
					<textarea data-content class="form-control col-md-10 center-block" rows="15" required name="text" title="text"></textarea>
				</div>
				<div class="modal-footer">

						<div class="text-right" data-send>
							<input class="btn btn-primary" type="submit" value="Сообщить об ошибке">
						</div>

						<div class="text-right" style="display: none" data-close>
							<button class="btn btn-success" data-dismiss="modal" >Закрыть</button>
						</div>

				</div>
			</form>
		</div>
	</div>
</div>

<script>
	function viewModalMessage(title, type, message){
		var m = $('#modalMessage');

		m.find('.modal-header > h4.modal-title').html(title);
		m.find('.modal-body > i.fa')
		 .removeClass('fa-exclamation-circle').removeClass('text-danger')
		 .removeClass('fa-exclamation-triangle').removeClass('text-warning')
		 .removeClass('fa-info-circle').removeClass('text-info');
		switch(type){
			case 'error':
				m.find('.modal-body > i.fa').addClass('fa-exclamation-circle text-danger');
				break;
			case 'warning':
				m.find('.modal-body > i.fa').addClass('fa-exclamation-triangle text-warning');
				break;
			default:
				m.find('.modal-body > i.fa').addClass('fa-info-circle text-info');
		}
		m.find('.modal-body > div.messages').html(message);

		m.modal('show');
	}
	function viewModalError(message){
		viewModalMessage('Ошибка', 'error', message);
	}
	function viewModalWarning(message){
		viewModalMessage('Предупреждение', 'warning', message);
	}
	function viewModalInfo(message){
		viewModalMessage('Информация', 'info', message);
	}
</script>

<script>
	var onloadCallback = function() {
		$('[data-captcha="reCaptcha"]').each(function(){
			grecaptcha.render(this, {
				'sitekey' : '<?=RE_SITE_KEY?>',
			});
		});
	};
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

<script>
	BX.addCustomEvent("onFrameDataReceived", BX.delegate(function() {
		initAdd2Compare();
		initAdd2Basket();
		checkFavoriteStars();
		$('[data-height="equal"]').each(function() {
			$(this).eqHeight('refresh');
		});
		$('[data-dotdotdot="true"]').dotdotdot();
		$("[data-toggle='tooltip']").tooltip();
	}, this));
</script>

</body>
</html>