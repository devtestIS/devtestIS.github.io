<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['ajaxAuth']=='Y'){
	if($arResult['ERROR_MESSAGE']){
		$res = array(
			'RESULT' => 'BAD', 
			'ERROR' => $arResult['ERROR_MESSAGE']['MESSAGE'], 
			'CAPTCHA_CODE' => $arResult['CAPTCHA_CODE']
		);
	}else{
		$res = array('RESULT' => 'OK');
	}
	$GLOBALS['APPLICATION']->RestartBuffer();
	echo \Bitrix\Main\Web\Json::encode($res);
	die;
}