<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Intervolga\Custom\SiteTools;
	
include "init.php";
?><!DOCTYPE html>
<!--[if lt IE 8]>
<html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="<?=LANGUAGE_ID?>"><![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie10 lt-ie9" lang="<?=LANGUAGE_ID?>"><![endif]-->
<!--[if IE 9]>
<html class="no-js lt-ie10" lang="<?=LANGUAGE_ID?>"><![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="<?= LANGUAGE_ID ?>"><!--<![endif]-->
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MNZ9PQK');</script>
    <!-- End Google Tag Manager -->
	<? $APPLICATION->ShowHead() ?>
	<title><? $APPLICATION->ShowTitle() ?></title>
	<script data-skip-moving="true">!function(e,n,t,r,o){function a(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):l?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function c(e,n){return typeof e===n}function i(e,n,t){var r;for(var o in e)if(e[o]in n)return t===!1?e[o]:(r=n[e[o]],c(r,"function")?fnBind(r,t||n):r);return!1}function s(e,n,t,r,o){var a=e.charAt(0).toUpperCase()+e.slice(1),s=(e+" "+d.join(a+" ")+a).split(" ");return c(n,"string")||c(n,"undefined")?testProps(s,n,r,o):(s=(e+" "+v.join(a+" ")+a).split(" "),i(s,n,t))}var u={},f=n.documentElement,l="svg"===f.nodeName.toLowerCase(),m={elem:a("modern-browser")},p=function(){var e,n=m.elem.style;try{n.fontSize="3ch",e=-1!==n.fontSize.indexOf("ch")}catch(t){e=!1}return e};u.csschunit=p();var g="Moz O ms Webkit",d=g.split(" "),v=g.toLowerCase().split(" "),w=function(e,n,t){return 0===e.indexOf("@")?h(e):(-1!=e.indexOf("-")&&(e=cssToDOM(e)),n?s(e,n,t):s(e,"pfx"))},h=function(n){var t,r=prefixes.length,a=e.CSSRule;if(o===a)return o;if(!n)return!1;if(n=n.replace(/^@/,""),t=n.replace(/-/g,"_").toUpperCase()+"_RULE",t in a)return"@"+n;for(var c=0;r>c;c++){var i=prefixes[c],s=i.toUpperCase()+"_"+t;if(s in a)return"@-"+i.toLowerCase()+"-"+n}return!1},y=w("performance",e),E=c(y,"function")?y():y;u.performance=!!E;var C,R=w("crypto",e);if(R&&"getRandomValues"in R&&"Uint32Array"in e){var S=new Uint32Array(10),x=R.getRandomValues(S);C=x&&c(x[0],"number")}var U=C;u.getRandomValues=!!U;var N=n[t].className;N=N.replace(/no-js/g,"js"),u.csschunit&u.performance&u.getRandomValues||(N=N.replace(/modern-browser/g,"old-browser")),N+="ontouchstart"in e||e.DocumentTouch!==o&&n instanceof DocumentTouch?" touch":" no-touch",n[r]&&n[r]("http://www.w3.org/2000/svg","svg").createSVGRect&&(N+=" svg"),n[t].className=N}(window,document,"documentElement","createElementNS");</script>
	<script data-skip-moving="true">(function(){'use strict';var f,g=[];function l(a){g.push(a);1==g.length&&f()}function m(){for(;g.length;)g[0](),g.shift()}f=function(){setTimeout(m)};function n(a){this.a=p;this.b=void 0;this.f=[];var b=this;try{a(function(a){q(b,a)},function(a){r(b,a)})}catch(c){r(b,c)}}var p=2;function t(a){return new n(function(b,c){c(a)})}function u(a){return new n(function(b){b(a)})}function q(a,b){if(a.a==p){if(b==a)throw new TypeError;var c=!1;try{var d=b&&b.then;if(null!=b&&"object"==typeof b&&"function"==typeof d){d.call(b,function(b){c||q(a,b);c=!0},function(b){c||r(a,b);c=!0});return}}catch(e){c||r(a,e);return}a.a=0;a.b=b;v(a)}}
			function r(a,b){if(a.a==p){if(b==a)throw new TypeError;a.a=1;a.b=b;v(a)}}function v(a){l(function(){if(a.a!=p)for(;a.f.length;){var b=a.f.shift(),c=b[0],d=b[1],e=b[2],b=b[3];try{0==a.a?"function"==typeof c?e(c.call(void 0,a.b)):e(a.b):1==a.a&&("function"==typeof d?e(d.call(void 0,a.b)):b(a.b))}catch(h){b(h)}}})}n.prototype.g=function(a){return this.c(void 0,a)};n.prototype.c=function(a,b){var c=this;return new n(function(d,e){c.f.push([a,b,d,e]);v(c)})};
			function w(a){return new n(function(b,c){function d(c){return function(d){h[c]=d;e+=1;e==a.length&&b(h)}}var e=0,h=[];0==a.length&&b(h);for(var k=0;k<a.length;k+=1)u(a[k]).c(d(k),c)})}function x(a){return new n(function(b,c){for(var d=0;d<a.length;d+=1)u(a[d]).c(b,c)})};window.Promise||(window.Promise=n,window.Promise.resolve=u,window.Promise.reject=t,window.Promise.race=x,window.Promise.all=w,window.Promise.prototype.then=n.prototype.c,window.Promise.prototype["catch"]=n.prototype.g);}());

		(function(){var k=!!document.addEventListener;function l(a,b){k?a.addEventListener("scroll",b,!1):a.attachEvent("scroll",b)}function v(a){document.body?a():k?document.addEventListener("DOMContentLoaded",a):document.attachEvent("onreadystatechange",function(){"interactive"!=document.readyState&&"complete"!=document.readyState||a()})};function w(a){this.a=document.createElement("div");this.a.setAttribute("aria-hidden","true");this.a.appendChild(document.createTextNode(a));this.b=document.createElement("span");this.c=document.createElement("span");this.h=document.createElement("span");this.f=document.createElement("span");this.g=-1;this.b.style.cssText="max-width:none;display:inline-block;position:absolute;height:100%;width:100%;overflow:scroll;font-size:16px;";this.c.style.cssText="max-width:none;display:inline-block;position:absolute;height:100%;width:100%;overflow:scroll;font-size:16px;";
			this.f.style.cssText="max-width:none;display:inline-block;position:absolute;height:100%;width:100%;overflow:scroll;font-size:16px;";this.h.style.cssText="display:inline-block;width:200%;height:200%;font-size:16px;max-width:none;";this.b.appendChild(this.h);this.c.appendChild(this.f);this.a.appendChild(this.b);this.a.appendChild(this.c)}
			function y(a,b){a.a.style.cssText="max-width:none;min-width:20px;min-height:20px;display:inline-block;overflow:hidden;position:absolute;width:auto;margin:0;padding:0;top:-999px;left:-999px;white-space:nowrap;font:"+b+";"}function z(a){var b=a.a.offsetWidth,c=b+100;a.f.style.width=c+"px";a.c.scrollLeft=c;a.b.scrollLeft=a.b.scrollWidth+100;return a.g!==b?(a.g=b,!0):!1}function A(a,b){function c(){var a=m;z(a)&&null!==a.a.parentNode&&b(a.g)}var m=a;l(a.b,c);l(a.c,c);z(a)};function B(a,b){var c=b||{};this.family=a;this.style=c.style||"normal";this.weight=c.weight||"normal";this.stretch=c.stretch||"normal"}var C=null,D=null,H=!!window.FontFace;function I(){if(null===D){var a=document.createElement("div");try{a.style.font="condensed 100px sans-serif"}catch(b){}D=""!==a.style.font}return D}function J(a,b){return[a.style,a.weight,I()?a.stretch:"","100px",b].join(" ")}
			B.prototype.load=function(a,b){var c=this,m=a||"BESbswy",x=b||3E3,E=(new Date).getTime();return new Promise(function(a,b){if(H){var K=new Promise(function(a,b){function e(){(new Date).getTime()-E>=x?b():document.fonts.load(J(c,c.family),m).then(function(c){1<=c.length?a():setTimeout(e,25)},function(){b()})}e()}),L=new Promise(function(a,c){setTimeout(c,x)});Promise.race([L,K]).then(function(){a(c)},function(){b(c)})}else v(function(){function q(){var b;if(b=-1!=f&&-1!=g||-1!=f&&-1!=h||-1!=g&&-1!=
					h)(b=f!=g&&f!=h&&g!=h)||(null===C&&(b=/AppleWebKit\/([0-9]+)(?:\.([0-9]+))/.exec(window.navigator.userAgent),C=!!b&&(536>parseInt(b[1],10)||536===parseInt(b[1],10)&&11>=parseInt(b[2],10))),b=C&&(f==r&&g==r&&h==r||f==t&&g==t&&h==t||f==u&&g==u&&h==u)),b=!b;b&&(null!==d.parentNode&&d.parentNode.removeChild(d),clearTimeout(G),a(c))}function F(){if((new Date).getTime()-E>=x)null!==d.parentNode&&d.parentNode.removeChild(d),b(c);else{var a=document.hidden;if(!0===a||void 0===a)f=e.a.offsetWidth,g=n.a.offsetWidth,
				h=p.a.offsetWidth,q();G=setTimeout(F,50)}}var e=new w(m),n=new w(m),p=new w(m),f=-1,g=-1,h=-1,r=-1,t=-1,u=-1,d=document.createElement("div"),G=0;d.dir="ltr";y(e,J(c,"sans-serif"));y(n,J(c,"serif"));y(p,J(c,"monospace"));d.appendChild(e.a);d.appendChild(n.a);d.appendChild(p.a);document.body.appendChild(d);r=e.a.offsetWidth;t=n.a.offsetWidth;u=p.a.offsetWidth;F();A(e,function(a){f=a;q()});y(e,J(c,'"'+c.family+'",sans-serif'));A(n,function(a){g=a;q()});y(n,J(c,'"'+c.family+'",serif'));A(p,function(a){h=
				a;q()});y(p,J(c,'"'+c.family+'",monospace'))})})};window.FontFaceObserver=B;window.FontFaceObserver.prototype.check=window.FontFaceObserver.prototype.load=B.prototype.load;"undefined"!==typeof module&&(module.exports=window.FontFaceObserver);}());
	</script>
	<script data-skip-moving="true">!function(){"use strict";for(var a=[["Open Sans",{"style":"normal","weight":300}],["Open Sans",{"style":"normal","weight":400}],["Open Sans",{"style":"normal","weight":500}],["Open Sans",{"style":"normal","weight":700}],["Open Sans",{"style":"normal","weight":900}],["PT Sans",{"style":"normal","weight":400}],["PT Sans",{"style":"normal","weight":700}]],b=[],c=0;c<a.length;c++){var d=a[c];d[1]=d[1]||{},d[2]=d[2]||null,d[3]=d[3]||3e4;var e=new FontFaceObserver(d[0],d[1]);b.push(e.check(d[2],d[3]))}b.length>0&&Promise.all(b).then(function(){document.documentElement.className+=" custom-fonts-loaded"})}();</script>
	<script data-skip-moving="true">!function(){"use strict";var a=new FontFaceObserver("FontAwesome");a.check("&#xf024;").then(function(){document.documentElement.className+=" fa-font-loaded"},function(){document.documentElement.className+=" fa-font-loaded"})}();</script>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MNZ9PQK"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<!--noindex-->
<noscript class="page__noscript">В вашем браузере отключен JavaScript. Многие элементы сайта могут работать
	некорректно.
</noscript>
<!--[if lt IE 8]>
<div class="page__browsehappy">Вы используете <strong>устаревший</strong> браузер. Пожалуйста
	<a rel="nofollow" onclick="window.open(this.href, '_blank');return false;" href="http://browsehappy.com/">
		обновите свой браузер</a> чтобы улучшить взаимодействие с сайтом.
</div>
<![endif]-->
<!--/noindex-->

<div class="header">
	<div class="header__top">
		<div class="container">
			<div class="top-line">
				<div class="top-line__col top-line__col_column_one">
					<?$APPLICATION->IncludeComponent(
						"intervolga.custom:shops",
						"top",
						array(
						)
					);?>
				</div>
				<div class="top-line__col top-line__col_column_two">
					<div class="phone">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_TEMPLATE_PATH . '/include/top_line_phone_num.php'
							)
						);?>
						<div class="phone__label">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => SITE_TEMPLATE_PATH . '/include/top_line_phone_label.php'
								)
							);?>
						</div>
					</div>
					<?$APPLICATION->IncludeComponent(
						"intervolga.custom:event.send",
						"top-line",
						array(
							"FIELDS" => array(
								0 => array(
									"CODE" => "NAME",
									"NAME" => "Ваше имя",
									"TYPE" => "text",
									"REQUIRE" => "Y",
									"DEFAULT" => "#USER_FULL_NAME#",
								),
								1 => array(
									"CODE" => "PHONE",
									"NAME" => "Телефон",
									"TYPE" => "text",
									"REQUIRE" => "Y",
									"DEFAULT" => "#USER_PHONE#",
								),
							),
							"OK_TEXT" => "Спасибо, ваше сообщение принято.",
							"USE_CAPTCHA" => "N",
							"COMPONENT_TEMPLATE" => ".default",
							"USE_AJAX" => "Y",
							"EMAIL_TO" => \Bitrix\Main\Config\Option::Get("grain.customsettings", "EMAIL_CALLBACK_FORM"),
							"EVENT_NAME" => "CUSTOM_CALLBACK_REQUEST",
							"EVENT_MESSAGE_ID" => array(
								0 => "74",
							),
							"SEND_IMMEDIATE" => "N",
							"CACHE_TYPE" => "A",
							"CACHE_TIME" => "3600"
						),
						NULL,
						array('HIDE_ICONS' => 'Y')
					);?>
				</div>
				<div class="top-line__col top-line__col_column_three">
					<div class="schedule">
						<div class="schedule__label text-center">
							<?
							$city = \Intervolga\Custom\City::getCurrent();
							if($city) {
								echo $city['UF_SCHEDULE'];
							}
							?>
						</div>
					</div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:system.auth.form",
						"authorization",
						Array(
							"FORGOT_PASSWORD_URL" => "/login/",
							"PROFILE_URL" => "/personal/",
							"REGISTER_URL" => "/login/?register=yes",
							"SHOW_ERRORS" => "Y"
						)
					);?>
				</div>
			</div>
		</div>
	</div>
	<div class="header__mid">
		<div class="container">
			<div class="header-main-line">
				<div class="header-main-line__col header-main-line__col_column_one">
					<div class="logo">
						<? if (!SiteTools::isIndex()): ?>
							<a href="/">
						<? endif; ?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_TEMPLATE_PATH . '/include/logo.php'
							)
						);?>
						<? if (!SiteTools::isIndex()): ?>
							</a>
						<? endif; ?>
					</div>
				</div>
				<div class="header-main-line__col header-main-line__col_column_two">
					<?
					$GLOBALS['arrFilterSpeedSearch'] = array(
						'PROPERTY_PUBLIKATSIYA__VALUE' => 'Да'
					);
					$APPLICATION->IncludeComponent(
						"intervolga.custom:search.iblock",
						"",
						Array(
							"IBLOCK_TYPE" => IBLOCK_TYPE_CATALOG,
							"IBLOCK_ID" => IBLOCK_ID_CATALOG,
							"MAX_COUNT_ELEMENTS" => 5,
							"MAX_COUNT_SECTIONS" => 4,
							"PAGE" => "#SITE_DIR#search/",
							"FILTER_NAME" => 'arrFilterSpeedSearch'
						),
						NULL,
						array('HIDE_ICONS' => 'Y')
					);?>
				</div>
				<div class="header-main-line__col header-main-line__col_column_three">
					<div class="control-cart">
						<div class="control-cart__comparison">
							<a class="search-btn fa fa-search btn btn-default" href="#search-mob" data-toggle="collapse"></a>
						</div>
						<div class="control-cart__comparison">
							<?$APPLICATION->IncludeComponent(
								"intervolga.custom:favorite.product.line",
								"",
								array(
									'IBLOCK_TYPE' => IBLOCK_TYPE_CATALOG,
									'IBLOCK_ID' => IBLOCK_ID_CATALOG,
									'FAVORITE_PAGE' => '/personal/favorite/'
								),
								NULL,
								array('HIDE_ICONS' => 'Y')
							);?>
						</div>
						<?
						$arParamsCompareComponent = array(
							"ACTION_VARIABLE" => "",
							"AJAX_MODE" => "Y",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "Y",
							"COMPARE_URL" => "/catalog/compare/",
							"DETAIL_URL" => "",
							"IBLOCK_ID" => IBLOCK_ID_CATALOG,
							"IBLOCK_TYPE" => IBLOCK_TYPE_CATALOG,
							"NAME" => "CATALOG_COMPARE_LIST",
							"POSITION" => "top left",
							"POSITION_FIXED" => "N",
							"PRODUCT_ID_VARIABLE" => "id"
						);
						?>
						<div class="control-cart__comparison">
						<?$APPLICATION->IncludeComponent(
							"bitrix:catalog.compare.list",
							"control-cart",
							$arParamsCompareComponent,
							NULL,
							array('HIDE_ICONS' => 'Y')
						);?>
						</div>
						<div class="control-cart__basket">
							<?$APPLICATION->IncludeComponent(
								"bitrix:sale.basket.basket.line",
								"control-cart",
								array(
									"HIDE_ON_BASKET_PAGES" => "N",
									"PATH_TO_BASKET" => "/personal/cart/",
									"PATH_TO_ORDER" => "/personal/order/make/",
									"PATH_TO_PERSONAL" => "/personal/",
									"PATH_TO_PROFILE" => "/personal/",
									"PATH_TO_REGISTER" => "/login/?registr=yes",
									"POSITION_FIXED" => "N",
									"SHOW_AUTHOR" => "N",
									"SHOW_EMPTY_VALUES" => "Y",
									"SHOW_NUM_PRODUCTS" => "Y",
									"SHOW_PERSONAL_LINK" => "N",
									"SHOW_PRODUCTS" => "Y",
									"SHOW_TOTAL_PRICE" => "Y",
									//catalog
									"ACTION_VARIABLE" => "action",
									"ADD_ELEMENT_CHAIN" => "Y",
									"ADD_PROPERTIES_TO_BASKET" => "Y",
									"ADD_SECTIONS_CHAIN" => "Y",
									"AJAX_MODE" => "N",
									"AJAX_OPTION_ADDITIONAL" => "",
									"AJAX_OPTION_HISTORY" => "N",
									"AJAX_OPTION_JUMP" => "N",
									"AJAX_OPTION_STYLE" => "N",
									"BASKET_URL" => "/personal/cart/",
									"BIG_DATA_RCM_TYPE" => \Bitrix\Main\Config\Option::get('grain.customsettings', 'RCM_TYPE', 'similar_sell'),
									"CACHE_FILTER" => "Y",
									"CACHE_GROUPS" => "Y",
									"CACHE_TIME" => "36000000",
									"CACHE_TYPE" => "A",
									"COMMON_ADD_TO_BASKET_ACTION" => "",
									"COMMON_SHOW_CLOSE_POPUP" => "N",
									"COMPARE_ELEMENT_SORT_FIELD" => "sort",
									"COMPARE_ELEMENT_SORT_ORDER" => "asc",
									"COMPARE_FIELD_CODE" => array("", "*", ""),
									"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
									"COMPARE_POSITION_FIXED" => "N",
									"CONVERT_CURRENCY" => "Y",
									"CURRENCY_ID" => "RUB",
									"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
									"DETAIL_ADD_TO_BASKET_ACTION" => array(
										0 => "BUY",
									),
									"DETAIL_BACKGROUND_IMAGE" => "-",
									"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
									"DETAIL_BLOG_URL" => "catalog_comments",
									"DETAIL_BLOG_USE" => "Y",
									"DETAIL_BRAND_USE" => "N",
									"DETAIL_BROWSER_TITLE" => "-",
									"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
									"DETAIL_DETAIL_PICTURE_MODE" => "IMG",
									"DETAIL_DISPLAY_NAME" => "Y",
									"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
									"DETAIL_FB_APP_ID" => "",
									"DETAIL_FB_USE" => "N",
									"DETAIL_META_DESCRIPTION" => "-",
									"DETAIL_META_KEYWORDS" => "-",
									"DETAIL_PROPERTY_CODE" => array("*"),
									"DETAIL_SET_CANONICAL_URL" => "N",
									"DETAIL_SET_VIEWED_IN_COMPONENT" => "Y",
									"DETAIL_SHOW_MAX_QUANTITY" => "N",
									"DETAIL_USE_COMMENTS" => "Y",
									"DETAIL_USE_VOTE_RATING" => "Y",
									"DETAIL_VK_USE" => "N",
									"DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",
									"DISABLE_INIT_JS_IN_COMPONENT" => "N",
									"DISPLAY_BOTTOM_PAGER" => "Y",
									"DISPLAY_ELEMENT_SELECT_BOX" => "N",
									"DISPLAY_TOP_PAGER" => "N",
									"ELEMENT_SORT_FIELD" => "sort",
									"ELEMENT_SORT_FIELD2" => "id",
									"ELEMENT_SORT_ORDER" => "asc",
									"ELEMENT_SORT_ORDER2" => "desc",
									"FILTER_FIELD_CODE" => array("", ""),
									"FILTER_NAME" => "catalogSmartFilter",
									"FILTER_PRICE_CODE" => array(),
									"FILTER_PROPERTY_CODE" => array("", ""),
									"FILTER_VIEW_MODE" => "VERTICAL",
									"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
									"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
									"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "3",
									"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
									"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
									"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
									"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "3",
									"GIFTS_MESS_BTN_BUY" => "Выбрать",
									"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
									"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
									"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "3",
									"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
									"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
									"GIFTS_SHOW_IMAGE" => "Y",
									"GIFTS_SHOW_NAME" => "Y",
									"GIFTS_SHOW_OLD_PRICE" => "Y",
									"HIDE_NOT_AVAILABLE" => "Y",
									"IBLOCK_ID" => IBLOCK_ID_CATALOG,
									"IBLOCK_TYPE" => IBLOCK_TYPE_CATALOG,
									"INCLUDE_SUBSECTIONS" => "Y",
									"INSTANT_RELOAD" => "N",
									"LABEL_PROP" => "-",
									"LINE_ELEMENT_COUNT" => "3",
									"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
									"LINK_IBLOCK_ID" => "",
									"LINK_IBLOCK_TYPE" => "",
									"LINK_PROPERTY_SID" => "",
									"LIST_BROWSER_TITLE" => "-",
									"LIST_META_DESCRIPTION" => "-",
									"LIST_META_KEYWORDS" => "-",
									"LIST_PROPERTY_CODE" => array("*"),
									"MESSAGE_404" => "",
									"MESS_BTN_ADD_TO_BASKET" => "В корзину",
									"MESS_BTN_BUY" => "Купить",
									"MESS_BTN_COMPARE" => "Сравнение",
									"MESS_BTN_DETAIL" => "Подробнее",
									"MESS_NOT_AVAILABLE" => "Нет в наличии",
									"PAGER_BASE_LINK_ENABLE" => "N",
									"PAGER_DESC_NUMBERING" => "N",
									"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
									"PAGER_SHOW_ALL" => "N",
									"PAGER_SHOW_ALWAYS" => "N",
									"PAGER_TEMPLATE" => ".default",
									"PAGER_TEMPLATE_BEFORE" => "before-list",
									"PAGER_TEMPLATE_AFTER" => "after-list",
									"PAGER_TITLE" => "Товары",
									"PAGE_ELEMENT_COUNT" => "21",
									"PARTIAL_PRODUCT_PROPERTIES" => "N",
									"PRICE_CODE" => \Intervolga\Custom\Product::getAllPriceCode(),
									"PRICE_VAT_INCLUDE" => "Y",
									"PRICE_VAT_SHOW_VALUE" => "Y",
									"PRODUCT_ID_VARIABLE" => "id",
									"PRODUCT_PROPERTIES" => array(),
									"PRODUCT_PROPS_VARIABLE" => "prop",
									"PRODUCT_QUANTITY_VARIABLE" => "",
									"SECTIONS_HIDE_SECTION_NAME" => "Y",
									"SECTIONS_SHOW_PARENT_NAME" => "Y",
									"SECTIONS_VIEW_MODE" => "TILE",
									"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
									"SECTION_BACKGROUND_IMAGE" => "-",
									"SECTION_COUNT_ELEMENTS" => "N",
									"SECTION_ID_VARIABLE" => "SECTION_ID",
									"SECTION_TOP_DEPTH" => "1",
									"SEF_FOLDER" => "/catalog/",
									"SEF_URL_TEMPLATES" => Array(
										"compare" => "compare/?action=#ACTION_CODE#",
										"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
										"characteristics" => "#SECTION_CODE#/#ELEMENT_CODE#/characteristics/",
										"reviews" => "#SECTION_CODE#/#ELEMENT_CODE#/reviews/",
										"section" => "#SECTION_CODE#/",
										"sections" => "",
										"smart_filter" => "#SECTION_CODE#/filter/#SMART_FILTER_PATH#/apply/"
									),
									"SET_LAST_MODIFIED" => "N",
									"SET_STATUS_404" => "Y",
									"SET_TITLE" => "Y",
									"SHOW_404" => "Y",
									"SHOW_DEACTIVATED" => "N",
									"SHOW_DISCOUNT_PERCENT" => "N",
									"SHOW_OLD_PRICE" => "N",
									"SHOW_PRICE_COUNT" => "1",
									"SHOW_TOP_ELEMENTS" => "Y",
									"SIDEBAR_DETAIL_SHOW" => "Y",
									"SIDEBAR_PATH" => "",
									"SIDEBAR_SECTION_SHOW" => "Y",
									"TEMPLATE_THEME" => "blue",
									"TOP_ADD_TO_BASKET_ACTION" => "ADD",
									"TOP_ELEMENT_COUNT" => "9",
									"TOP_ELEMENT_SORT_FIELD" => "sort",
									"TOP_ELEMENT_SORT_FIELD2" => "id",
									"TOP_ELEMENT_SORT_ORDER" => "asc",
									"TOP_ELEMENT_SORT_ORDER2" => "desc",
									"TOP_LINE_ELEMENT_COUNT" => "3",
									"TOP_PROPERTY_CODE" => array("", ""),
									"TOP_VIEW_MODE" => "SECTION",
									"USE_ALSO_BUY" => "N",
									"USE_BIG_DATA" => "Y",
									"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
									"USE_COMPARE" => "Y",
									"USE_ELEMENT_COUNTER" => "Y",
									"USE_FILTER" => "Y",
									"USE_GIFTS_DETAIL" => "N",
									"USE_GIFTS_MAIN_PR_SECTION_LIST" => "N",
									"USE_GIFTS_SECTION" => "N",
									"USE_MAIN_ELEMENT_SECTION" => "N",
									"USE_PRICE_COUNT" => "N",
									"USE_PRODUCT_QUANTITY" => "N",
									"USE_SALE_BESTSELLERS" => "Y",
									"USE_STORE" => "N",
									"SMART_FILTER_HIDE_ZIRO" => "Y"
								),
								NULL,
								array('HIDE_ICONS' => 'Y')
							);?>
						</div>
					</div>
				</div>
				<?$APPLICATION->ShowViewContent("col_column_product");?>
			</div>
			<?$APPLICATION->ShowViewContent("search_mobile");?>
		</div>
	</div>
	<div class="mango-call-site call-btn-wrap" data-options='{"host": "widgets.mango-office.ru/", "id": "MTAwMDYxOTU=", "errorMessage": "В данный момент наблюдаются технические проблемы и совершение звонка невозможно"}'>
		<a class="btn btn-primary" role="button" href="#">Позвонить онлайн</a></div>
	</div>
</div>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.list",
	"comparison",
	$arParamsCompareComponent,
	NULL,
	array('HIDE_ICONS' => 'Y')
);?>
<?$APPLICATION->IncludeComponent(
	"intervolga.custom:favorite.product.line",
	"favorite",
	array(
		'IBLOCK_TYPE' => IBLOCK_TYPE_CATALOG,
		'IBLOCK_ID' => IBLOCK_ID_CATALOG,
		'FAVORITE_PAGE' => '/personal/favorite/'
	),
	NULL,
	array('HIDE_ICONS' => 'Y')
);?>

<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"menu-line",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(""),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "N",
		"ROOT_MENU_TYPE" => "line",
		"USE_EXT" => "N",
		"CACHE_SELECTED_ITEMS" => "N"
	)
);?>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"menu-line",
	Array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "N",
		"IBLOCK_ID" => IBLOCK_ID_CATALOG,
		"IBLOCK_TYPE" => IBLOCK_TYPE_CATALOG,
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array("",""),
		"SECTION_ID" => '',
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array("",""),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "LINE"
	),
	NULL,
	array('HIDE_ICONS' => 'Y')
);?>

<?$APPLICATION->AddBufferContent("wrapCatalogBegin");?>

<div class="container">
	<? if (!SiteTools::isIndex() && ERROR_404 != 'Y') { ?>
	<? $APPLICATION->IncludeComponent(
		"bitrix:breadcrumb",
		"breadcrumb",
		Array(
			"PATH" => "",
			"SITE_ID" => "s1",
			"START_FROM" => "0"
		)
	); ?>
	<? } ?>
	<?$APPLICATION->AddBufferContent("viewBreadcrumbAndTitle");?>
