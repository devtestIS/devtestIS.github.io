<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;

if (Application::getInstance()->getContext()->getRequest()->getQuery("BR") === "")
{
	LocalRedirect($APPLICATION->GetCurDir());
}

Loc::loadMessages(__DIR__ . "/template.php");
?>
<? if ($arResult["SHORT_ITEMS"]): ?>
	<form action="" method="get" class="form-inline mvm">
		<div class="form-group">
			<select name="BR" class="form-control">
				<option value=""><?=Loc::getMessage("INTERVOLGA_CUSTOM.CHOOSE_BRAND")?></option>
				<? foreach ($arResult["SHORT_ITEMS"] as $id => $item): ?>
					<?
					$attrs = "";
					if ($id == Application::getInstance()->getContext()->getRequest()->getQuery("BR"))
					{
						$attrs = "selected=\"selected\"";
						if ($arParams["OUT_FILTER_NAME"])
						{
							$GLOBALS[$arParams["OUT_FILTER_NAME"]] = $id;
						}
					}
					?>
					<option value="<?= $id ?>" <?=$attrs?>><?= $item ?></option>
				<? endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block"><?=Loc::getMessage("INTERVOLGA_CUSTOM.SEARCH")?></button>
		</div>
	</form>
<? endif ?>