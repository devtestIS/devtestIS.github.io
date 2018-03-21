<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
use Bitrix\Main\Page\Asset;
use Bitrix\Main\Page\AssetLocation;
use Intervolga\Custom\SiteTools;

$site_template_path = $site_template_path ?: SITE_TEMPLATE_PATH;

$assets = Asset::getInstance();
$assets->addString('<meta charset="utf-8" />', false, AssetLocation::BEFORE_CSS);
$assets->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge" />', false, AssetLocation::BEFORE_CSS);
$assets->addString('<meta name="viewport" content="width=device-width, initial-scale=1" />', false,
    AssetLocation::BEFORE_CSS);
$assets->addString('<meta name="format-detection" content="telephone=no" />', false, AssetLocation::BEFORE_CSS);
$assets->addString('<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />', false,
    AssetLocation::BEFORE_CSS);
$assets->addString('<script data-skip-moving="true">!function(e,t,c,o){var n=t[c].className;n=n.replace(/no-js/g,"js"),n+="ontouchstart"in e||void 0!==e.DocumentTouch&&t instanceof DocumentTouch?" touch":" no-touch",t[o]&&t[o]("http://www.w3.org/2000/svg","svg").createSVGRect&&(n+=" svg"),t[c].className=n}(window,document,"documentElement","createElementNS");</script>',
    false, AssetLocation::BEFORE_CSS);


$assets->addString(' <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet" type="text/css" />',
    false, AssetLocation::BEFORE_CSS);

$assets->addString('<script data-skip-moving="true">!function(e,t,c,o){var n=t[c].className;n=n.replace(/no-js/g,"js"),n+="ontouchstart"in e||void 0!==e.DocumentTouch&&t instanceof DocumentTouch?" touch":" no-touch",t[o]&&t[o]("http://www.w3.org/2000/svg","svg").createSVGRect&&(n+=" svg"),t[c].className=n}(window,document,"documentElement","createElementNS");</script>',
    false, AssetLocation::BEFORE_CSS);

$assets->addCss($site_template_path . '/bem/pages/_merged/_merged.css');
$assets->addString('<!--[if lt IE 9]><script data-skip-moving="true" src="' . CUtil::GetAdditionalFileURL($site_template_path . '/bower_components/html5shiv/html5shiv-respond.min.js') . '"></script><![endif]-->',
    true, AssetLocation::AFTER_CSS);

$assets->addString('<link rel="apple-touch-icon" sizes="180x180" href="' .
    CUtil::GetAdditionalFileURL($site_template_path . '/favicons/touch-icon-180x180-iphone-6-plus.png') . '">', false,
    AssetLocation::AFTER_JS);
$assets->addString('<link rel="apple-touch-icon" sizes="152x152" href="' .
    CUtil::GetAdditionalFileURL($site_template_path . '/favicons/touch-icon-152x152-ipad-retina.png') . '">', false,
    AssetLocation::AFTER_JS);
$assets->addString('<link rel="apple-touch-icon" sizes="120x120" href="' .
    CUtil::GetAdditionalFileURL($site_template_path . '/favicons/touch-icon-120x120-iphone-retina.png') . '">', false,
    AssetLocation::AFTER_JS);
$assets->addString('<link rel="apple-touch-icon" sizes="76x76" href="' .
    CUtil::GetAdditionalFileURL($site_template_path . '/favicons/touch-icon-76x76-ipad.png') . '">', false,
    AssetLocation::AFTER_JS);
$assets->addString('<link rel="apple-touch-icon" sizes="57x57" href="' .
    CUtil::GetAdditionalFileURL($site_template_path . '/favicons/touch-icon-57x57-iphone.png') . '">', false,
    AssetLocation::AFTER_JS);
$assets->addString('<link rel="shortcut icon" href="' .
    CUtil::GetAdditionalFileURL($site_template_path . '/favicons/favicon-32x32.png') . '">', false,
    AssetLocation::AFTER_JS);
$assets->addString('<link rel="shortcut icon" href="' .
    CUtil::GetAdditionalFileURL($site_template_path . '/favicons/favicon.ico') . '">', false, AssetLocation::AFTER_JS);

$assets->addCss($site_template_path . '/jivo_fix.css');
$assets->addCss($site_template_path . '/fix.css');

$assets->addString('<script>!function(t){function e(t){options=JSON.parse(t.getAttribute("data-options")),t.querySelector("button, a").setAttribute("onClick","window.open(\'https://"+options.host+"widget/call-from-site-auto-dial/"+options.id+"\', \'_blank\', \'width=238,height=400,resizable=no,toolbar=no,menubar=no,location=no,status=no\'); return false;")}for(var o=document.getElementsByClassName(t),n=0;n<o.length;n++){var i=o[n];if("true"!=o[n].getAttribute("init")){options=JSON.parse(o[n].getAttribute("data-options"));var a=document.createElement("link");a.setAttribute("rel","stylesheet"),a.setAttribute("type","text/css"),a.setAttribute("href",window.location.protocol+"//"+options.host+"css/widget-button.css"),a.readyState?a.onreadystatechange=function(){("complete"==this.readyState||"loaded"==this.readyState)&&e(i)}:(a.onload=e(i),a.onerror=function(){options=JSON.parse(i.getAttribute("data-options")),i.querySelector("."+t+" button, ."+t+" a").setAttribute("onClick","alert(\'"+options.errorMessage+"\');")}),(i||document.documentElement).appendChild(a),i.setAttribute("init","true")}}}("mango-call-site");</script>');
$assets->addJs($site_template_path . '/bem/pages/_merged/_merged.js');
$assets->addJs($site_template_path . '/bem/pages/_merged/_merged.i18n.' . LANGUAGE_ID . '.js');
if ($GLOBALS['IS_PRINT_PAGE'] !== true) {
    $assets->addJs($site_template_path . '/js/bx.wait.js');

    $assets->addJs($site_template_path . '/jivo_fix.js');
    $assets->addJs($site_template_path . '/js/custom.js');
    $assets->addJs($site_template_path . '/js/lib/sort.js');
}

$assets->addString('
            <script data-skip-moving="true">
                checkCityCookie();
                function cityChoose() {
                    var url = "/local/components/intervolga.custom/shops/ajax.php";
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", url + "/?ajaxRequest=Y", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if(xhr.readyState == 4 && xhr.status == 200) {
                           var response = JSON.parse(xhr.responseText);
                           if(response.REDIRECT) {
                               window.location.href = response.URL + window.location.pathname;
                           }
                        }
                    };                              
                    xhr.send("check=true");
                }
                
                function checkCityCookie() {
                    var cookie = getCookie("LsiLoc");
                    var acceptCookie = getCookie(\'LsiLocAccept\');
                    if(cookie && !acceptCookie) {
                        var url = window.location.hostname;
                        var urlMatches = url.match(/([^.]*(?=\.))?\.?(.+\..*)$/);
                        if(!(urlMatches[1]) && cookie !== "ufa")
                        {
                            window.stop();
                            cityChoose(true);
                        }
                    } else {
                        cityChoose(false);
                    }
                }
               
                function getCookie(name) {
                    var matches = document.cookie.match(new RegExp(
                        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, \'\\$1\') + "=([^;]*)"
                    ));
                    return matches ? decodeURIComponent(matches[1]) : undefined;		
                }
                
                </script>',
    false);

function wrapCatalogBegin()
{
    return WRAP_CATALOG === 'Y' ? '<div class="catalog">' : '';
}

function wrapCatalogEnd()
{
    return WRAP_CATALOG === 'Y' ? '</div>' : '';
}

function wrapInformationBegin()
{
    return WRAP_INFORMATION === 'Y' ? '<div class="information ' . $GLOBALS['class_for_information'] . '">' : '';
}

function wrapInformationEnd()
{
    return WRAP_INFORMATION === 'Y' ? '</div>' : '';
}

function viewBreadcrumbAndTitle()
{
    if (SiteTools::isIndex() || ERROR_404 == 'Y') {
        return '';
    }

    if($GLOBALS['TOP_LEFT_MENU'] == 'Y') {
        ob_start();?>
        <h1 class="title-page"><?= $GLOBALS['APPLICATION']->GetTitle(false)?></h1>
        <? $GLOBALS['APPLICATION']->IncludeComponent(
            "bitrix:menu",
            "left-top",
            Array(
                "ALLOW_MULTI_SELECT" => "N",
                "CHILD_MENU_TYPE" => "left",
                "DELAY" => "N",
                "MAX_LEVEL" => "1",
                "MENU_CACHE_GET_VARS" => array(""),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_USE_GROUPS" => "N",
                "ROOT_MENU_TYPE" => "left",
                "USE_EXT" => "Y"
            )
        ); ?>
        </div>
        <?
        return ob_get_clean();
    } else {
        $content = $GLOBALS['APPLICATION']->GetViewContent('article_date');
        $content .= '<div class="' . $GLOBALS['APPLICATION']->GetProperty("class_title_line") . '"><h1 class="title-page';
        if(TITLE_WITHOUT_MARGIN != 'Y') {
            $content .= ' title-page_inner';
        }
        if (SiteTools::isInSection('search/*')) {
            $content .= ' mbl';
        }
        $content .= '">' . $GLOBALS['APPLICATION']->GetTitle(false) . '</h1>';
        $content .= $GLOBALS['APPLICATION']->GetViewContent('after_title_html');
        $content .= '</div></div>';
        $content .= '<div class="container ' . $GLOBALS['APPLICATION']->GetProperty("container") . '">';
        if ($GLOBALS['WITHOUT_LEFT_MENU'] !== 'Y') {
            $content .= '<div class="row"><div class="col-md-9 col-sm-8 col-md-push-3 col-sm-push-4">' . wrapInformationBegin();
        }
    }

    return $content;
}

function viewLeftMenu()
{
    if (SiteTools::isIndex() || ERROR_404 == 'Y' || $GLOBALS['WITHOUT_LEFT_MENU'] == 'Y') {
        return '';
    }
    ob_start();
    echo wrapInformationEnd();
    ?>
    </div>
    <div class="col-md-3 col-sm-4 col-md-pull-9 col-sm-pull-8">
        <? $GLOBALS['APPLICATION']->IncludeComponent(
            "bitrix:menu",
            "left",
            Array(
                "ALLOW_MULTI_SELECT" => "N",
                "CHILD_MENU_TYPE" => "left",
                "DELAY" => "N",
                "MAX_LEVEL" => "1",
                "MENU_CACHE_GET_VARS" => array(""),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_USE_GROUPS" => "N",
                "ROOT_MENU_TYPE" => "left",
                "USE_EXT" => "Y"
            )
        ); ?>
        <div class="info-banner hidden-xs">
            <? $GLOBALS['APPLICATION']->IncludeComponent(
                "bitrix:advertising.banner",
                "after-left-menu",
                Array(
                    "CACHE_TIME" => "0",
                    "CACHE_TYPE" => "A",
                    "NOINDEX" => "Y",
                    "QUANTITY" => "10",
                    "TYPE" => "AFTER_LEFT_MENU"
                )
            ); ?>
            <? $GLOBALS['APPLICATION']->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => SITE_TEMPLATE_PATH . '/include/info_banner.php'
                )
            ); ?>
        </div>
    </div>
    </div>
    <?
    return ob_get_clean();
}

function catalogDescription()
{
    $catalogDescription = $GLOBALS['APPLICATION']->GetViewContent("catalogDescription");
    return $catalogDescription ? '<div class="container mbl mtl"><div class="article">' . $catalogDescription . '</div></div>' : '';
}

if ($GLOBALS['USER']->isAdmin()) {
    $eventManager = \Bitrix\Main\EventManager::getInstance();
    $eventManager->addEventHandler(
        "main",
        "OnEndBufferContent",
        "removeJivoSite"
    );
}