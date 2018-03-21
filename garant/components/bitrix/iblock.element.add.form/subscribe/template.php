<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);
?>
<? if ($arResult['MESSAGE']): ?>
	<script>alert('<?= $arResult['MESSAGE'] ?>');</script>
<?endif;?>
<div class="footer__col">
	<div class="search">
		<form class="form-subscribe" name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
			<?=bitrix_sessid_post()?>
			<?if (is_array($arResult["PROPERTY_LIST"]) && !empty($arResult["PROPERTY_LIST"])):?>
				<?foreach ($arResult["PROPERTY_LIST"] as $propertyID):?>
					<?if($propertyID == 'NAME') continue;?>
					<input class="form-control" type="email" name="PROPERTY[<?=$propertyID?>][0]" placeholder="Подпишитесь на рассылку" />
				<?endforeach;?>
			<?endif;?>
			<input type="hidden" name="PROPERTY[NAME][0]" size="30" value="<?= date('d.m.Y')?>">
			<button name="iblock_submit" class="btn btn-info text-uppercase" type="submit" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>">
				<i class="icomoon icon icon-envelope-o"></i>
			</button>
		</form>
	</div>
</div>