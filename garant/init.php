<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Page\Asset;
use Bitrix\Main\Page\AssetLocation;

$assets = Asset::getInstance();
$assets->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge" />', false, AssetLocation::BEFORE_CSS);
$assets->addString('<meta name="viewport" content="width=device-width, initial-scale=1" />', false, AssetLocation::BEFORE_CSS);
$assets->addString('<meta name="format-detection" content="telephone=no" />', false, AssetLocation::BEFORE_CSS);
$assets->addString('<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />', false, AssetLocation::BEFORE_CSS);
$assets->addString('<script data-skip-moving="true">!function(e,t,c,o){var n=t[c].className;n=n.replace(/no-js/g,"js"),n+="ontouchstart"in e||void 0!==e.DocumentTouch&&t instanceof DocumentTouch?" touch":" no-touch",t[o]&&t[o]("http://www.w3.org/2000/svg","svg").createSVGRect&&(n+=" svg"),t[c].className=n}(window,document,"documentElement","createElementNS");</script>', false, AssetLocation::BEFORE_CSS);
$assets->addCss(SITE_TEMPLATE_PATH . '/bem/pages/_merged/_merged.css');
$assets->addString('<!--[if lt IE 9]><script data-skip-moving="true" src="' . CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . '/bower_components/html5shiv/html5shiv-respond.min.js') . '"></script><![endif]-->', true, AssetLocation::AFTER_CSS);
$assets->addString('<script data-skip-moving="true">document.createElement( "picture" );</script>', true, AssetLocation::AFTER_CSS);

$favicons = array(
	"apple-touch-icon" => array(
		'touch-icon-180x180-iphone-6-plus.png',
		'touch-icon-152x152-ipad-retina.png',
		'touch-icon-120x120-iphone-retina.png',
		'touch-icon-76x76-ipad.png',
		'touch-icon-57x57-iphone.png',
	),
	"shortcut icon" => array(
		'favicon-32x32.png',
		'favicon.ico',
	),
);
foreach ($favicons as $rel => $files)
{
	foreach ($files as $file)
	{
		$href = SITE_TEMPLATE_PATH . '/favicons/' . $file;
		$assets->addString(
			'<link rel="' . $rel . '" href="' . CUtil::GetAdditionalFileURL($href) . '">',
			false,
			AssetLocation::AFTER_JS
		);
	}
}

$assets->addString('<script src="' . CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . '/bem/pages/_merged/_merged.async.js') . '" async></script>');
$assets->addJs(SITE_TEMPLATE_PATH . '/bem/pages/_merged/_merged.js');
$assets->addJs(SITE_TEMPLATE_PATH . '/bem/pages/_merged/_merged.i18n.' . LANGUAGE_ID . '.js');
$assets->addJs(SITE_TEMPLATE_PATH . '/js/custom.js');
