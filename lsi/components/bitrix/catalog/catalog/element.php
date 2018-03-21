<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

$this->setFrameMode(true);
?>

<?
unset($basketAction);
?>

<?
$arSection = CIBlockSection::GetList(
    array(),
    array('=CODE' => $arResult["VARIABLES"]["SECTION_CODE"])
)->Fetch();

if (!$arResult["VARIABLES"]["SECTION_CODE"] || !$arSection) {
    if (Loader::includeModule('iblock')) {
        \Bitrix\Iblock\Component\Tools::process404(
            trim($arParams["MESSAGE_404"]) ?: "Раздел не найден.",
            true,
            $arParams["SET_STATUS_404"] === "Y",
            $arParams["SHOW_404"] === "Y",
            $arParams["FILE_404"]
        );
    }
    return;
}
$SUB_PAGES = array(
    "characteristics" => array(),
    "reviews" => array(),
);
$variablesMask = array();
foreach ($arResult['VARIABLES'] as $code => $val) {
    $variablesMask['#' . $code . '#'] = $val;
}
foreach ($SUB_PAGES as $key => $data) {
    $SUB_PAGES[$key]['URL'] = $arResult["FOLDER"] . str_replace(array_keys($variablesMask), array_values($variablesMask),
            $arResult['URL_TEMPLATES'][$key]);
}
ob_start();
$ElementID = $APPLICATION->IncludeComponent(
    "bitrix:catalog.element",
    "catalog",
    array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
        "META_KEYWORDS" => $arParams["DETAIL_META_KEYWORDS"],
        "META_DESCRIPTION" => $arParams["DETAIL_META_DESCRIPTION"],
        "BROWSER_TITLE" => $arParams["DETAIL_BROWSER_TITLE"],
        "SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
        "BASKET_URL" => $arParams["BASKET_URL"],
        "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
        "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
        "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
        "CHECK_SECTION_ID_VARIABLE" => (isset($arParams["DETAIL_CHECK_SECTION_ID_VARIABLE"])
            ? $arParams["DETAIL_CHECK_SECTION_ID_VARIABLE"] : ''),
        "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
        "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
        "MESSAGE_404" => $arParams["MESSAGE_404"],
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "SHOW_404" => $arParams["SHOW_404"],
        "FILE_404" => $arParams["FILE_404"],
        "PRICE_CODE" => $arParams["PRICE_CODE"],
        "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
        "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
        "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
        "PRICE_VAT_SHOW_VALUE" => $arParams["PRICE_VAT_SHOW_VALUE"],
        "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
        "PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
        "ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"])
            ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
        "PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"])
            ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
        "LINK_IBLOCK_TYPE" => $arParams["LINK_IBLOCK_TYPE"],
        "LINK_IBLOCK_ID" => $arParams["LINK_IBLOCK_ID"],
        "LINK_PROPERTY_SID" => $arParams["LINK_PROPERTY_SID"],
        "LINK_ELEMENTS_URL" => $arParams["LINK_ELEMENTS_URL"],

        "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
        "OFFERS_FIELD_CODE" => $arParams["DETAIL_OFFERS_FIELD_CODE"],
        "OFFERS_PROPERTY_CODE" => $arParams["DETAIL_OFFERS_PROPERTY_CODE"],
        "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
        "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
        "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
        "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],

        "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
        "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
        "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
        "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
        "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
        'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
        'CURRENCY_ID' => $arParams['CURRENCY_ID'],
        'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
        'USE_ELEMENT_COUNTER' => $arParams['USE_ELEMENT_COUNTER'],
        'SHOW_DEACTIVATED' => $arParams['SHOW_DEACTIVATED'],
        "USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],

        'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
        'LABEL_PROP' => $arParams['LABEL_PROP'],
        'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
        'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
        'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
        'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
        'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
        'SHOW_MAX_QUANTITY' => $arParams['DETAIL_SHOW_MAX_QUANTITY'],
        'MESS_BTN_BUY' => $arParams['MESS_BTN_BUY'],
        'MESS_BTN_ADD_TO_BASKET' => $arParams['MESS_BTN_ADD_TO_BASKET'],
        'MESS_BTN_SUBSCRIBE' => $arParams['MESS_BTN_SUBSCRIBE'],
        'MESS_BTN_COMPARE' => $arParams['MESS_BTN_COMPARE'],
        'MESS_NOT_AVAILABLE' => $arParams['MESS_NOT_AVAILABLE'],
        'USE_VOTE_RATING' => $arParams['DETAIL_USE_VOTE_RATING'],
        'VOTE_DISPLAY_AS_RATING' => (isset($arParams['DETAIL_VOTE_DISPLAY_AS_RATING'])
            ? $arParams['DETAIL_VOTE_DISPLAY_AS_RATING'] : ''),
        'USE_COMMENTS' => $arParams['DETAIL_USE_COMMENTS'],
        'BLOG_USE' => (isset($arParams['DETAIL_BLOG_USE']) ? $arParams['DETAIL_BLOG_USE'] : ''),
        'BLOG_URL' => (isset($arParams['DETAIL_BLOG_URL']) ? $arParams['DETAIL_BLOG_URL'] : ''),
        'BLOG_EMAIL_NOTIFY' => (isset($arParams['DETAIL_BLOG_EMAIL_NOTIFY']) ? $arParams['DETAIL_BLOG_EMAIL_NOTIFY']
            : ''),
        'VK_USE' => (isset($arParams['DETAIL_VK_USE']) ? $arParams['DETAIL_VK_USE'] : ''),
        'VK_API_ID' => (isset($arParams['DETAIL_VK_API_ID']) ? $arParams['DETAIL_VK_API_ID'] : 'API_ID'),
        'FB_USE' => (isset($arParams['DETAIL_FB_USE']) ? $arParams['DETAIL_FB_USE'] : ''),
        'FB_APP_ID' => (isset($arParams['DETAIL_FB_APP_ID']) ? $arParams['DETAIL_FB_APP_ID'] : ''),
        'BRAND_USE' => (isset($arParams['DETAIL_BRAND_USE']) ? $arParams['DETAIL_BRAND_USE'] : 'N'),
        'BRAND_PROP_CODE' => (isset($arParams['DETAIL_BRAND_PROP_CODE']) ? $arParams['DETAIL_BRAND_PROP_CODE'] : ''),
        'DISPLAY_NAME' => (isset($arParams['DETAIL_DISPLAY_NAME']) ? $arParams['DETAIL_DISPLAY_NAME'] : ''),
        'ADD_DETAIL_TO_SLIDER' => (isset($arParams['DETAIL_ADD_DETAIL_TO_SLIDER'])
            ? $arParams['DETAIL_ADD_DETAIL_TO_SLIDER'] : ''),
        'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
        "ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : ''),
        "ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
        "DISPLAY_PREVIEW_TEXT_MODE" => (isset($arParams['DETAIL_DISPLAY_PREVIEW_TEXT_MODE'])
            ? $arParams['DETAIL_DISPLAY_PREVIEW_TEXT_MODE'] : ''),
        "DETAIL_PICTURE_MODE" => (isset($arParams['DETAIL_DETAIL_PICTURE_MODE'])
            ? $arParams['DETAIL_DETAIL_PICTURE_MODE'] : ''),
        'ADD_TO_BASKET_ACTION' => $basketAction,
        'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
        'DISPLAY_COMPARE' => (isset($arParams['USE_COMPARE']) ? $arParams['USE_COMPARE'] : ''),
        'COMPARE_PATH' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['compare'],
        'SHOW_BASIS_PRICE' => (isset($arParams['DETAIL_SHOW_BASIS_PRICE']) ? $arParams['DETAIL_SHOW_BASIS_PRICE']
            : 'Y'),
        'BACKGROUND_IMAGE' => (isset($arParams['DETAIL_BACKGROUND_IMAGE']) ? $arParams['DETAIL_BACKGROUND_IMAGE'] : ''),
        'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT'])
            ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : ''),
        'SET_VIEWED_IN_COMPONENT' => (isset($arParams['DETAIL_SET_VIEWED_IN_COMPONENT'])
            ? $arParams['DETAIL_SET_VIEWED_IN_COMPONENT'] : ''),

        "USE_GIFTS_DETAIL" => $arParams['USE_GIFTS_DETAIL'] ?: 'Y',
        "USE_GIFTS_MAIN_PR_SECTION_LIST" => $arParams['USE_GIFTS_MAIN_PR_SECTION_LIST'] ?: 'Y',
        "GIFTS_SHOW_DISCOUNT_PERCENT" => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
        "GIFTS_SHOW_OLD_PRICE" => $arParams['GIFTS_SHOW_OLD_PRICE'],
        "GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => $arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],
        "GIFTS_DETAIL_HIDE_BLOCK_TITLE" => $arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE'],
        "GIFTS_DETAIL_TEXT_LABEL_GIFT" => $arParams['GIFTS_DETAIL_TEXT_LABEL_GIFT'],
        "GIFTS_DETAIL_BLOCK_TITLE" => $arParams["GIFTS_DETAIL_BLOCK_TITLE"],
        "GIFTS_SHOW_NAME" => $arParams['GIFTS_SHOW_NAME'],
        "GIFTS_SHOW_IMAGE" => $arParams['GIFTS_SHOW_IMAGE'],
        "GIFTS_MESS_BTN_BUY" => $arParams['GIFTS_MESS_BTN_BUY'],

        "GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
        "GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'],

        "FILE_INCLUDE_HASH" => file_exists($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/catalog_pay_variant.php')
            ? md5_file($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/catalog_pay_variant.php') : false,

        "DELIVERY_URL" => "/for-clients/shipping-payment/delivery-ufa/",

        "SUB_PAGES" => $SUB_PAGES,

        "CITY" => $arParams['CITY'] ?: \Intervolga\Custom\City::getCurrentXmlID(),
    ),
    $component
);
$elementHTML = ob_get_clean();
$GLOBALS["CATALOG_CURRENT_ELEMENT_ID"] = $ElementID;

ob_start();
$APPLICATION->IncludeComponent(
    "intervolga.custom:catalog.buywith",
    "",
    array(
        "ACTION_VARIABLE" => (!empty($arParams["ACTION_VARIABLE"]) ? $arParams["ACTION_VARIABLE"] : "action"),
        "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
        "PRICE_CODE" => $arParams["PRICE_CODE"],
        "COUNT" => 16,
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "PRODUCT_ID" => $ElementID
    ),
    $component,
    array("HIDE_ICONS" => "Y")
);
$catalogBigDataHTML = ob_get_clean();
$elementHTML = str_replace('<!--CATALOG BIG DATA PRODUCTS-->', $catalogBigDataHTML, $elementHTML);

ob_start();
$APPLICATION->IncludeComponent(
    "intervolga.custom:hlblock.list",
    "reviews-product",
    Array(
        "BLOCK_ID" => HLBLOCK_ID_REVIEW,
        "DETAIL_URL" => "",
        'FILTER' => array(
            'UF_ELEMENT' => $ElementID,
            'UF_APPROVED' => true
        ),
        'ORDER' => array(
            'UF_WRITE' => 'DESC'
        ),
        'ELEMENTS_COUNT' => 10,
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A"
    )
);
$catalogReviewsHTML = ob_get_clean();
$elementHTML = str_replace('<!--CATALOG REVIEWS PRODUCTS-->', $catalogReviewsHTML, $elementHTML);

echo $elementHTML;
?>

<? \Intervolga\Custom\SiteTools::beginModal('oneClickForBuy'); ?>
    <div class="modal fade" id="modal-buy-one-click" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal__title">Купить в один клик</div>
                    <div class="modal__close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-responsive center-block"
                                 src="<?= $GLOBALS["CATALOG_CURRENT_ELEMENT"]['DETAIL_PICTURE_BUY']['src'] ?>"
                                 alt="<?= $GLOBALS["CATALOG_CURRENT_ELEMENT"]['DETAIL_PICTURE']['ALT'] ?>"/>
                        </div>
                        <div class="col-md-6">
                            <div class="buy-one-click-modal">
                                <div
                                    class="buy-one-click-modal__title"><?= $GLOBALS["CATALOG_CURRENT_ELEMENT"]['NAME'] ?></div>
                                <div class="buy-one-click-modal__info">Цена:
                                    <span><?= $GLOBALS["CATALOG_CURRENT_ELEMENT"]["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"] ?></span>
                                </div>
                                <div class="buy-one-click-modal__info">Количество: <span>1</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-left mhl">
                        <small class="small">Заполните форму быстрого заказа, наши менеджеры скоро свяжутся с Вами.
                        </small>
                        <? $APPLICATION->IncludeComponent(
                            "intervolga.custom:event.send",
                            "ajax-buy-one-click",
                            array(
                                "EMAIL_TO" => \Bitrix\Main\Config\Option::get(
                                    'grain.customsettings', 'EMAIL_CALLBACK_FORM'
                                ),
                                "EVENT_MESSAGE_ID" => array(),
                                "EVENT_NAME" => "FEEDBACK_FORM",
                                "FIELDS" => array(
                                    0 => array(
                                        "CODE" => "TITLE",
                                        "NAME" => "Заголовок",
                                        "TYPE" => "hidden",
                                        "REQUIRE" => "N",
                                        "DEFAULT" => "Купить в 1 клик",
                                    ),
                                    1 => array(
                                        "CODE" => "PRODUCT_ID",
                                        "NAME" => "ID продукта",
                                        "TYPE" => "hidden",
                                        "REQUIRE" => "N",
                                        "DEFAULT" => $GLOBALS["CATALOG_CURRENT_ELEMENT"]['ID']
                                    ),
                                    2 => array(
                                        "CODE" => "PRODUCT_NAME",
                                        "NAME" => "Название продукта",
                                        "TYPE" => "hidden",
                                        "REQUIRE" => "N",
                                        "DEFAULT" => $GLOBALS["CATALOG_CURRENT_ELEMENT"]['NAME']
                                    ),
                                    3 => array(
                                        "CODE" => "NAME",
                                        "NAME" => "Имя",
                                        "TYPE" => "text",
                                        "TYPE_PARAMS" => array(
                                            "LENGTH" => "",
                                            "REGEXP" => "",
                                        ),
                                        "REQUIRE" => "Y",
                                        "DEFAULT" => "#USER_FULL_NAME#",
                                    ),
                                    4 => array(
                                        "CODE" => "PHONE",
                                        "NAME" => "Телефон",
                                        "TYPE" => "text",
                                        "TYPE_PARAMS" => array(
                                            "LENGTH" => "",
                                            "REGEXP" => "",
                                        ),
                                        "REQUIRE" => "Y",
                                        "DEFAULT" => "",
                                    ),
                                ),
                                "OK_TEXT" => "Спасибо, ваше сообщение принято.",
                                "SEND_IMMEDIATE" => "N",
                                "USE_CAPTCHA" => "Y"
                            ),
                            false
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? \Intervolga\Custom\SiteTools::endModal(); ?>
<? \Intervolga\Custom\SiteTools::beginModal('addReview'); ?>
    <div class="modal fade" id="modal-write-a-review" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header" data-bem-repaced="modal__header">
                        <div class="modal__title">Написать отзыв</div>
                        <div class="modal__close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <input name="action" type="hidden" value="addReview"/>
                        <input name="ITEM[UF_ELEMENT]" type="hidden" value="<?= $ElementID ?>"/>
                        <?= bitrix_sessid_post() ?>
                        <?
                        $fullName = trim($GLOBALS['USER']->GetFullName());
                        if ($fullName) {
                            ?>
                            <input name="ITEM[UF_NAME]" type="hidden" required="required" value="<?= $fullName ?>"/>
                            <?
                        } else {
                            ?>
                            <div class="form-group">
                                <label>Ваше имя<span class="text-danger">*</span></label>
                                <input name="ITEM[UF_NAME]" class="input form-control" type="text"
                                       required="required" placeholder="Иванов Иван"/>
                            </div>
                            <?
                        }
                        ?>
                        <div class="form-group">
                            <label>Телефон</label>
                            <input placeholder="+7(ххх)ххх-хх-хх" pattern="\+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}" name="ITEM[UF_TEL]" class="input form-control" type="text"/>
                        </div>
                        <div class="form-group">
                            <label>E-mail (для получения уведомлений)</label>
                            <input name="ITEM[UF_EMAIL]" class="input form-control" type="email" placeholder="ivanov@email.ru"/>
                        </div>
                        <div class="form-group ">
                            <label>Достоинства<span class="text-danger">*</span></label>
                            <textarea name="ITEM[UF_ADVANTAGES]" class="textarea form-control" rows="3"
                                      required="required"></textarea>
                        </div>
                        <div class="form-group ">
                            <label>Недостатки<span class="text-danger">*</span></label>
                            <textarea name="ITEM[UF_DISADVANTAGES]" class="textarea form-control" rows="3"
                                      required="required"></textarea>
                        </div>
                        <div class="form-group ">
                            <label>Комментарий</label>
                            <textarea name="ITEM[UF_TEXT]" class="textarea form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Оценка<span class="text-danger">*</span></label>
                            <div class="star-rating star-rating_size_lg">
                                <div class="star-rating__wrap">
                                    <?
                                    for ($i = 5; $i > 0; $i--) {
                                        ?>
                                        <input class="star-rating__input"
                                               id="star_rating_input_new_<?= $i ?>"
                                               type="radio"
                                               name="ITEM[UF_RATE]"
                                               value="<?= $i ?>"/>
                                        <label class="star-rating__icon fa fa-star"
                                               for="star_rating_input_new_<?= $i ?>"></label>
                                        <?
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?
                        if (!$GLOBALS['USER']->IsAuthorized()) {
                            ?>
                            <div class="form-group">
                                <div data-captcha="reCaptcha"></div>
                            </div>
                            <?
                        }
                        ?>
                        <div class="messages"></div>
                        <div><span class="text-danger">*</span> Обязательные поля</div>
                    </div>
                    <div class="modal-footer" data-bem-repaced="modal__footer">
                        <div class="text-right">
                            <button class="btn btn-primary" type="submit">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<? \Intervolga\Custom\SiteTools::endModal(); ?>
<? \Intervolga\Custom\SiteTools::beginModal('foundCheaper'); ?>
    <div class="modal fade" id="modal-found-a-cheaper" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header" data-bem-repaced="modal__header">
                        <div class="modal__title">Нашли дешевле, снизим цену!</div>
                        <div class="modal__close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p class="well">Нашли этот товар дешевле? Пришлите ссылку на него в другом магазине, и в течение часа вам позвонит наш
                            менеджер. В случае отказа на ваш e-mail придет письмо.</p>
                        <input name="action" type="hidden" value="foundCheaper"/>
                        <input name="ITEM[UF_ELEMENT]" type="hidden" value="<?= $ElementID ?>"/>
                        <input name="ITEM[UF_PAGE]" type="hidden" value="<?= $GLOBALS['APPLICATION']->GetCurPage() ?>"/>
                        <?= bitrix_sessid_post() ?>
                        <?
                        $fullName = trim($GLOBALS['USER']->GetFullName());
                        if ($fullName) {
                            ?>
                            <input name="ITEM[UF_NAME]" type="hidden" required="required" value="<?= $fullName ?>"/>
                            <?
                        } else {
                            ?>
                            <div class="form-group">
                                <label>Ваше имя<span class="text-danger">*<span></label>
                                <input name="ITEM[UF_NAME]" class="input form-control" type="text"
                                       required="required" placeholder="Иванов Иван"/>
                            </div>
                            <?
                        }
                        $email = trim($GLOBALS['USER']->GetEmail());
                        if ($email) {
                            ?>
                            <input name="ITEM[UF_EMAIL]" type="hidden" required="required" value="<?= $email ?>"/>
                            <?
                        } else {
                            ?>
                            <div class="form-group">
                                <label>E-mail<span class="text-danger">*<span></label>
                                <input name="ITEM[UF_EMAIL]" class="input form-control" type="email"
                                       required="required" placeholder="ivanov@email.ru"/>
                            </div>
                            <?
                        }
                        ?>
                        <div class="form-group">
                            <label>Телефон<span class="text-danger">*<span></label>
                            <input name="ITEM[UF_PHONE]" class="input form-control" type="text" pattern="\+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}"
                                   required="required" placeholder="+7(ххх)ххх-хх-хх"/>
                        </div>
                        <div class="form-group">
                            <label>Ссылка на товар в другом магазине<span class="text-danger">*<span></label>
                            <input name="ITEM[UF_LINK]" class="input form-control" type="text"
                                   required="required" placeholder="http://"/>
                        </div>
                        <div class="form-group ">
                            <label>Сообщение</label>
                            <textarea name="ITEM[UF_TEXT]" class="textarea form-control" rows="3"></textarea>
                        </div>

                        <?
                        if (!$GLOBALS['USER']->IsAuthorized()) {
                            ?>
                            <div class="form-group">
                                <div data-captcha="reCaptcha"></div>
                            </div>
                            <?
                        }
                        ?>
                        <div class="messages"></div>
                    </div>
                    <div class="modal-footer" data-bem-repaced="modal__footer">
                        <div class="pull-left mvs">
                            <a href="/for-clients/nashli-deshevle-snizim-tsenu/" target="_blank">Правила и условия акции</a>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-primary" type="submit">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<? \Intervolga\Custom\SiteTools::endModal(); ?>
<?
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['action'] == 'addReview') {
    $result = \Intervolga\Custom\SiteTools::addReviewForProduct();
    $GLOBALS['APPLICATION']->RestartBuffer();
    echo json_encode($result);
    die;
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['action'] == 'addError') {
    $result = \Intervolga\Custom\SiteTools::addError();
    $GLOBALS['APPLICATION']->RestartBuffer();
    echo json_encode($result);
    die;
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['action'] == 'foundCheaper') {
    $result = \Intervolga\Custom\SiteTools::foundCheaper();
    $GLOBALS['APPLICATION']->RestartBuffer();
    echo json_encode($result);
    die;
}
?>