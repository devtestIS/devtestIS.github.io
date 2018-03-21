<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var array $arResult
 */
use Bitrix\Main\Web\Json;
global $APPLICATION;

if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['axaj'] == true) {
	$APPLICATION->RestartBuffer();
	$result = array();
	if($arResult['DATA_SAVED'] == "Y") {
		$result = array('STATUS' => 'OK');
	} elseif($arResult['strProfileError']) {
		$result = array(
			'STATUS' => 'ERROR',
			'ERROR' => $arResult['strProfileError']);
	}
	echo Json::encode($result);
	die;
}

$APPLICATION->SetTitle(GetMessage("PROFILE_TITLE"));