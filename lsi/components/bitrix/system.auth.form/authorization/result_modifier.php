<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult["USER_NAME"] = $GLOBALS['USER']->GetFullName();

if($arResult["SECURE_AUTH"] === true) {
	$sec = new CRsaSecurity();
	if (($arKeys = $sec->LoadKeys())) {
		$sec->SetKeys($arKeys);

		if (!isset($_SESSION['__STORED_RSA_RAND'])) {
			$_SESSION['__STORED_RSA_RAND'] = uniqid("", true);
		}

		$provider = new CRsaOpensslProvider();
		$provider->SetKeys($arKeys);

		$arResult['RSA_JS_DATA'] = array(
			"formid" => 'system_auth_form'.$arResult["RND"],
			"key" => $provider->GetPublicKey(),
			"rsa_rand" => $_SESSION['__STORED_RSA_RAND'],
			"params" => array('USER_PASSWORD')
		);
	}
}