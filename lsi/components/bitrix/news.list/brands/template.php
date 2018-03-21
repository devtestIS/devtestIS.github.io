<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if ($arResult["ITEMS"]): ?>
	<ul class="catalog__list">
		<? foreach ($arResult["ITEMS"] as $item): ?>
			<?
			$this->AddEditAction($item["ID"], $item["EDIT_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($item["ID"], $item["DELETE_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
			?>
			<li class="catalog__item">
				<div  id="<?=$this->GetEditAreaId($item['ID']);?>">
					<a class="catalog__link" href="<?= $item["DETAIL_PAGE_URL"] ?>" id="<?= $id ?>">
						<div class="catalog__wrap-img">
							<? if ($item["FIELDS"]["PREVIEW_PICTURE"]): ?>
								<img class="catalog__img" src="<?= $item["FIELDS"]["PREVIEW_PICTURE"]["SRC"] ?>"
									alt="<?= $item["PREVIEW_PICTURE"]["ALT"] ?>"
									title="<?= $item["PREVIEW_PICTURE"]["TITLE"]?>"/>
							<? endif ?>
						</div>

						<? if ($item["FIELDS"]["NAME"]): ?>
							<div class="catalog__title">
								<?= $item["FIELDS"]["NAME"] ?>
							</div>
						<? endif ?>
					</a>
				</div>
			</li>
		<? endforeach ?>
	</ul>
<? endif ?>
