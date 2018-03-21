<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var array $arResult
 */
?>
<? if ($arResult["ITEMS"]): ?>
	<section id="block-clients" class="company-clients container" data-bem-repaced="container container_fluid_off">
		<h2>Клиенты компании</h2>
			<div class="company-clients__row">
				<? foreach ($arResult["ITEMS"] as $item): ?>
					<?
					$this->AddEditAction($item["ID"], $item["EDIT_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($item["ID"], $item["DELETE_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
					$tag = 'span';
					$href = '';
					if ($item['PROPERTIES']['URL']['VALUE']) {
						$tag = 'a';
						$href = 'href="' . $item['PROPERTIES']['URL']['VALUE'] . '"';
						if (preg_match('/http(s)?\:/', $item['PROPERTIES']['URL']['VALUE'])) {
							$href .= ' target="_blank"';
						}
					}
					?>
					<<?= $tag?> id="<?=$this->GetEditAreaId($item['ID']);?>" class="company-clients__item" <?= $href?>><img class="company-clients__logo" src="<?= $item['PREVIEW_PICTURE']['SRC']?>" alt="<?= $item['NAME']?>"/></<?= $tag?>>
				<?endforeach;?>
			</div>
	</section>
<?endif;?>