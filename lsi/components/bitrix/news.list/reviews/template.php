<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var array $arResult
 */
$this->createFrame()->begin("Отзывы")?>
<? if ($arResult["ITEMS"]): ?>
<div class="reviews grey-section">
	<div class="container" data-bem-repaced="container container_fluid_off">
		<h2 class="h2">Отзывы<a target="_blank" href="https://market.yandex.ru/shop/394892/reviews">Все отзывы</a></h2>
		<div class="reviews__wrapper">
			<div class="reviews__row">
				<? foreach ($arResult["ITEMS"] as $item): ?>
					<?
					$this->AddEditAction($item["ID"], $item["EDIT_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($item["ID"], $item["DELETE_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
					?>
					<div class="reviews__column" id="<?=$this->GetEditAreaId($item['ID']);?>">
						<div class="clearfix mbl">
							<h4 class="reviews__name"><?= $item['NAME']?>
								<?if($item['PROPERTIES']['RATING']['VALUE']):?>
									<span class="comment-rating">
										<?for($i = 0; $i < $item['PROPERTIES']['RATING']['VALUE']; $i++):?>
											<i class="fa fa-star"></i>
										<?endfor;?>
									</span>
								<?endif;?>
							</h4>
							<?if($item['PROPERTIES']['DATE']['VALUE']):?>
								<span class="reviews__date"><?= strtolower(FormatDate('d F', strtotime($item['PROPERTIES']['DATE']['VALUE'])))?></span>
							<?endif;?>
						</div>
						<?if($item['PROPERTIES']['ADVANTAGES']['VALUE']):?>
							<p class="reviews__advantages"><strong>Достоинства: </strong><span><?= $item['PROPERTIES']['ADVANTAGES']['VALUE']['TEXT']?></span></p>
						<?endif;?>
						<?if($item['PROPERTIES']['DISADVANTAGES']['VALUE']):?>
							<p class="reviews__disadvantages"><strong>Недостатки: </strong><span><?= $item['PROPERTIES']['DISADVANTAGES']['VALUE']['TEXT']?></span></p>
						<?endif;?>
						<p class="reviews__comment"><strong>Комментарий: </strong><span><?= $item['DETAIL_TEXT']?></span></p>
					</div>
				<?endforeach;?>
			</div>
		</div>
	</div>
</div>
<?endif;?>