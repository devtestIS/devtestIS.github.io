<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var array $arResult
 */
?>
<? if ($arResult["ITEMS"]): ?>
	<section class="corporate-banner">
		<div class="corporate-banner__row">
			<h2 class="corporate-banner__heading">Компания «ЛидерСтройИнструмент» - это:</h2>
			<? foreach ($arResult["ITEMS"] as $item): ?>
				<?
				$this->AddEditAction($item["ID"], $item["EDIT_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($item["ID"], $item["DELETE_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
				?>
				<div class="corporate-banner__column" id="<?=$this->GetEditAreaId($item['ID']);?>">
					<img class="corporate-banner__icons" src="<?= $item['PREVIEW_PICTURE']['SRC']?>" alt="<?= $item['NAME']?>" />
					<span><?= $item['NAME']?></span>
				</div>
			<?endforeach;?>
			<p class="corporate-banner__description"><?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => SITE_TEMPLATE_PATH.'/include/corp_text.php'
					)
				);?></p>
		</div>
	</section>
<?endif;?>