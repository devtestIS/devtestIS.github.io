<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>

<div class="feedback"><button type="button" class="btn btn_feedback" data-toggle="modal" data-target="#modalCallback">обратный звонок</button></div>

<? \Intervolga\Custom\SiteTools::beginModal('modalCallback_' . $arResult['COUNTER'], $component); ?>
<div class="modal fade" id="modalCallback" tabindex="-1" role="dialog" aria-labelledby="modalCallback">
	<div class="modal-dialog modal__dialog_size_md" role="document">
		<div class="modal-content">
			<form id="modalCallbackForm">
				<div class="modal-header">
					<div class="modal__title">Обратный звонок</div>
					<div class="modal__close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></div>
				</div>
				<div class="modal-body">
					<div class="modal__compact">
						<small class="small">Заполните форму быстрого заказа, наши менеджеры скоро свяжутся с Вами.</small>
						<?=bitrix_sessid_post()?>
						<input type="hidden" name="event" value="<?=$arResult['COUNTER']?>" />
						<input type="hidden" name="ajax" value="Y" />

						<div class="form-group mtm">
							<label for="NAME">
								Ваше имя<span class="glyphicon glyphicon-asterisk text-danger" aria-hidden="true"></span>
							</label>
							<input type="text" class="form-control" name="NAME" placeholder="Имя" required="required" value="<?=$arResult['FIELDS']['NAME']['DEFAULT']?>">
						</div>
						<div class="form-group">
							<label for="PHONE">
								Телефон<span class="glyphicon glyphicon-asterisk text-danger" aria-hidden="true"></span>
							</label>
							<input type="text" class="form-control" name="PHONE" placeholder="+7(xxx)xxx-xx-xx" value="<?=$arResult['FIELDS']['PHONE']['DEFAULT']?>">
							<div class="text-danger" style="display: none;">Неверный формат (+7(xxx)xxx-xx-xx)</div>
						</div>
						<?
						if ($arParams["USE_CAPTCHA"] == "Y") {
							?>
							<div data-captcha="reCaptcha"></div>
							<?
						}
						?>
						<div class="alert alert-danger ajax-error"></div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="modal__compact">
						<button id="sendModalCallback" class="btn btn-primary" type="submit">Отправить</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<? \Intervolga\Custom\SiteTools::endModal(); ?>
<? \Intervolga\Custom\SiteTools::beginModal('modalCallbackSuccess_' . $arResult['COUNTER'], $component); ?>
<div class="modal fade" id="modalCallbackSuccess" tabindex="-1" role="dialog" aria-labelledby="modalCallback">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal__title">Обратный звонок</div>
				<div class="modal__close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></div>
			</div>
			<div class="modal-body">
				Спасибо! Ваши данные отправлены, наши специалисты свяжутся с вами в ближайшее время.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success">ОК</button>
			</div>
		</div>
	</div>
</div>
<? \Intervolga\Custom\SiteTools::endModal(); ?>
