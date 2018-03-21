<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

foreach ($arResult['ITEMS'] as &$row) {
	if($row['UF_WRITE']) {
		$row['UF_WRITE'] = date('d.m.Y в H:i', $row['UF_WRITE']->getTimestamp());
	}
}
unset($row);