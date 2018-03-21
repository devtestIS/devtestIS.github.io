<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

if ($arParams["ORDER_BY_FILTER_ID"] == "Y")
{
	if ($filterName = $arParams["FILTER_NAME"])
	{
		$filter = $GLOBALS[$filterName];
		if ($filter && $filter["ID"])
		{
			$items = $arResult["ITEMS"];
			$arResult["ITEMS"] = array();
			foreach ($filter["ID"] as $id)
			{
				foreach ($items as $item)
				{
					if ($item["ID"] == $id)
					{
						$arResult["ITEMS"][] = $item;
						break;
					}
				}
			}
		}
	}
}
unset($item);

include __DIR__ . "/../catalog-tile/result_modifier.php";