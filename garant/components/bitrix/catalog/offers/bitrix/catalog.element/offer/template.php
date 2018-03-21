<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;
use Intervolga\Custom\Iblock\Company;

$this->setFrameMode(true);

if (!empty($arResult)): ?>
	<div class="sticky__inner col-xs-12 col-sm-8 col-md-9">
		<?
		if ($arResult['PROPERTIES']['COMMENT']['VALUE'] && !$arResult['PROPERTIES']['ACCEPT_MODERATION']['VALUE'])
		{
			showError(Loc::getMessage('INTERVOLGA_GARANT.NOT_MODERATED'));
			CHTTP::setStatus('404 Not found');
			return;
		}
		?>
		<div class="offers-list row mbl">
			<div class="col-xs-12">
				<div class="thumbnails thumbnails_type_offer-detail">
						<div class="thumbnails__controls">
							<?if (INTERVOLGA_GARANT_CATALOG_OFFERS == 'Y'):?><a href="javascript:void(0)" class="btn btn-block btn-info" data-proposals='offers' data-offer-link="<?= $arResult['DETAIL_PAGE_URL']?>"><?= GetMessage('CATALOG_ELEMENT_OFFERS_GET_OFFER')?></a><?endif;?>
						</div>
					<? if ($arParams['IBLOCK_ID'] == Company::getIblockId()): ?>
						<div class="thumbnails__controls">
							<a href="<?= $arResult['DETAIL_PAGE_URL']?>?offers=Y" class="btn btn-block btn-default">
								<?= GetMessage('CATALOG_ELEMENT_OFFERS_ALL_OFFERS')?>
							</a>
						</div>
					<? endif ?>
					<div class="thumbnails__header">
						<?if (is_array($arResult['PREVIEW_PICTURE'])):?>
							<div class="thumbnails__image">
								<img class="img img_lazyload img-responsive lazyload" data-src="<?= $arResult['PREVIEW_PICTURE']["SRC"]?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="" />
							</div>
						<?endif;?>
					</div>
					<?if ($arResult['DETAIL_TEXT']): ?>
						<p><?= $arResult['DETAIL_TEXT']?></p>
					<?endif;?>
				</div>
			</div>
		</div>
		<?if (count($arResult['IMAGES'])):?>
			<div class="images-slider row">
				<?foreach ($arResult['IMAGES'] as $arImage):?>
					<div class="col-xs-6 col-md-4">
						<a href="<?= $arImage["~SRC"] ?>" data-lightbox="images-slider"><img class="img img_lazyload img-responsive lazyload" data-src="<?= $arImage["SRC"]?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt=""/></a>
					</div>
				<?endforeach;?>
			</div>
		<?endif;?>
		<?if (isset($arResult['SHOW_COUNTER'])): ?>
			<p class="h-custom h-custom-margin">Количество просмотров: <?= $arResult['SHOW_COUNTER']?></p>
		<?endif;?>
		<?$isFirstElement = true;?>
		<?foreach ($arResult['PROPERTIES']['ELEMENT']['PRINT_PROPERTIES'] as $arElementProp):?>
			<?if ($arElementProp['VALUE']):?>
				<p class="h-custom<?= ($isFirstElement) ? ' h-custom-margin' : ''?>"><?= $arElementProp['NAME']?>: <?= $arElementProp['VALUE']?></p>
				<?$isFirstElement = false;?>
			<?endif;?>
		<?endforeach;?>
		<?$isFirstElement = true;?>
		<?foreach ($arResult['PROPERTIES']['COMPANY']['PRINT_PROPERTIES'] as $arCompanyProp):?>
			<?if ($arCompanyProp['VALUE']):?>
				<p class="h-custom<?= ($isFirstElement) ? ' h-custom-margin' : ''?>"><?= $arCompanyProp['NAME']?>: <?= $arCompanyProp['VALUE']?></p>
				<?$isFirstElement = false;?>
			<?endif;?>
		<?endforeach;?>
	</div>
<?endif;?>
