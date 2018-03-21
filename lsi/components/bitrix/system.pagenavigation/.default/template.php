<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

if (!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
?>

<nav class="pagination-nav text-center">
	<ul class="pagination">
		<? if ($arResult["bDescPageNumbering"] === true): ?>
			<? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
				<? if ($arResult["bSavePage"]): ?>
					<li class="pagination__prev">
						<a rel="prev"
						   class="pagination__link"
						   href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"]
						   ?>=<?= ($arResult["NavPageNomer"] + 1) ?>">
							<i class="fa fa-angle-left visible-xs"></i><span class="hidden-xs">Предыдущая</span>
						</a>
					</li>

				<? else: ?>

					<? if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"] + 1)): ?>
						<li>
							<a rel="prev" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull
							?>"><?= GetMessage("PAGINATION_PREV") ?></a>
						</li>

					<? else: ?>
						<li class="pagination__prev">
							<a rel="prev"
							   class="pagination__link"
							   href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"]
							   ?>=<?= ($arResult["NavPageNomer"] + 1) ?>">
								<i class="fa fa-angle-left visible-xs"></i><span class="hidden-xs">Предыдущая</span>
							</a>
						</li>

					<? endif ?>
				<? endif ?>
			<? else: ?>
				<li class="pagination__prev pagination__prev_disabled">
					<a class="pagination__link" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull
					?>">
						<i class="fa fa-angle-left visible-xs"></i><span class="hidden-xs">Предыдущая</span>
					</a>
				</li>
			<? endif ?>

			<? while ($arResult["nStartPage"] >= $arResult["nEndPage"]): ?>
				<? $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1; ?>

				<? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]
					&& $arResult["nStartPage"] == $arResult["NavPageCount"]
				): ?>
					<li class="pagination__item active">
						<a class="pagination__link" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull
						?>"><?= $NavRecordGroupPrint ?></a>
					</li>
				<? elseif ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
					<li class="pagination__item active">
						<a class="pagination__link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"]
						?>=<?= ($arResult["NavPageNomer"]) ?>"><?= $NavRecordGroupPrint ?></a>
					</li>
				<?
				elseif ($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false): ?>
					<li class="pagination__item">
						<a class="pagination__link" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull
						?>"><?= $NavRecordGroupPrint ?></a>
					</li>
				<?
				else: ?>
					<li class="pagination__item">
						<a class="pagination__link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"]
						?>=<?= $arResult["nStartPage"] ?>"><?= $NavRecordGroupPrint ?></a>
					</li>
				<? endif ?>

				<? $arResult["nStartPage"]-- ?>
			<? endwhile ?>



			<? if ($arResult["NavPageNomer"] > 1): ?>
				<li class="pagination__next">
					<a rel="next" class="pagination__link"
					   href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"]
					   ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><i class="fa fa-angle-right visible-xs"></i><span class="hidden-xs">Следующая</span></a>
				</li>
			<? else: ?>
				<li class="pagination__next pagination__next_disabled">
					<a class="pagination__link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"]
					?>=1"><i class="fa fa-angle-right visible-xs"></i><span class="hidden-xs">Следующая</span></a>
				</li>
			<? endif ?>

		<? else: ?>

			<? if ($arResult["NavPageNomer"] > 1): ?>

				<? if ($arResult["bSavePage"]): ?>
					<li class="pagination__prev">
						<a rel="prev" class="pagination__link"
						   href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"]
						   ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><i class="fa fa-angle-left visible-xs"></i><span class="hidden-xs">Предыдущая</span></a>
					</li>

				<? else: ?>
					<? if ($arResult["NavPageNomer"] > 2): ?>
						<li class="pagination__prev">
							<a rel="prev" class="pagination__link"
							   href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"]
							   ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><i class="fa fa-angle-left visible-xs"></i><span class="hidden-xs">Предыдущая</span></a>
						</li>
					<? else: ?>
						<li class="pagination__prev">
							<a rel="prev" class="pagination__link"
							   href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull
							   ?>"><i class="fa fa-angle-left visible-xs"></i><span class="hidden-xs">Предыдущая</span></a>
						</li>
					<? endif ?>

				<? endif ?>

			<? else: ?>
				<li class="pagination__prev pagination__prev_disabled">
					<a class="pagination__link" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull
					?>"><i class="fa fa-angle-left visible-xs"></i><span class="hidden-xs">Предыдущая</span></a>
				</li>
			<? endif ?>

			<? while ($arResult["nStartPage"] <= $arResult["nEndPage"]): ?>

				<? if ($arResult["nStartPage"] == $arResult["NavPageNomer"] && $arResult["nStartPage"] == 1): ?>
					<li class="pagination__item active">
						<a class="pagination__link" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull
						?>"><?= $arResult["nStartPage"] ?></a>
					</li>
				<? elseif ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
					<li class="pagination__item active">
						<a class="pagination__link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"]
						?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
					</li>
				<?
				elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false): ?>
					<li class="pagination__item">
						<a class="pagination__link" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $arResult["nStartPage"]
							?></a>
					</li>
				<?
				else: ?>
					<li class="pagination__item">
						<a class="pagination__link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"]
						?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
					</li>
				<? endif ?>
				<? $arResult["nStartPage"]++ ?>
			<? endwhile ?>


			<? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
				<li class="pagination__next">
					<a rel="next" class="pagination__link"
					   href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"]
					   ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><i class="fa fa-angle-right visible-xs"></i><span class="hidden-xs">Следующая</span></a>
				</li>
			<? else: ?>
				<li class="pagination__next pagination__next_disabled">
					<a class="pagination__link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"]
					?>=<?= $arResult["NavPageCount"] ?>"><i class="fa fa-angle-right visible-xs"></i><span class="hidden-xs">Следующая</span></a>
				</li>
			<? endif ?>

		<? endif ?>
	</ul>

	<? if ($arResult["bShowAll"]): ?>
		<ul class="pagination">
			<? if ($arResult["NavShowAll"]): ?>
				<li class="pagination__item">
					<a class="pagination__link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>SHOWALL_<?= $arResult["NavNum"]
					?>=0"><?= GetMessage("PAGINATION_PAGED") ?></a>
				</li>
			<? else: ?>
				<li class="pagination__item">
					<a class="pagination__link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>SHOWALL_<?= $arResult["NavNum"]
					?>=1"><?= GetMessage("PAGINATION_ALL") ?></a>
				</li>
			<? endif ?>
		</ul>
	<? endif ?>

</nav>

