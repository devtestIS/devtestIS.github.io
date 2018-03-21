<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var CBitrixComponentTemplate $this
 */
$this->addExternalJs("/local/js/intervolga.custom/ajax.component-company/component.js");
$this->addExternalJs("/local/js/intervolga.custom/ajax.component-company/list.js");
$this->addExternalJs("/local/js/intervolga.custom/ajax.component-company/modal.js");
?>
<?ob_start();?>
<div class="modal fade modal-ajax-component" id="<?=$arResult["ID"]?>" tabindex="-1" role="dialog" aria-labelledby="<?=$arResult["LINK_ID"]?>" aria-hidden="true">
	<div class="modal-dialog <?=$arParams["SIZE"]?>">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<img src="<?=$templateFolder?>/images/loading.gif" alt="" class="img-responsive center-block">
			</div>
		</div>
	</div>
</div>
<?$APPLICATION->AddViewContent('offer_edit', ob_get_clean())?>

<script type="text/javascript">
	$(document).ready(function () {
		var ajaxComponentCompany = new IntervolgaCustom.AjaxComponentCompany.Component({
			url: "<?=$arResult["AJAX_VIEW_LINK"]?>",
			id: "<?=$arResult["ID"]?>",
			varName: "<?=$arParams["COMPONENT_ID_REQUEST_NAME"]?>",
			checkHeader: "<?=$arResult["CHECK_HEADER"]?>",
			/**
			 * @param {IntervolgaCustom.AjaxComponentCompany.Component} component
			 */
			callback: function(component) {
				var $modal = $("#" + this.__id);
				$modal.modal("show");
				component.loadAjax(
					function(component, data) {
						$modal.find(".modal-content").html(data);
						$modal.trigger("shown.bs.modal");
					},
					function(component) {
						alert("Invalid ajax component response");
					}
				);
			}
		});
		IntervolgaCustom.AjaxComponentCompany.List.add(ajaxComponentCompany);
		new IntervolgaCustom.AjaxComponentCompany.Modal(ajaxComponentCompany).bindHandlers();

		$("[data-target='#<?=$arResult["ID"]?>']").on("click", function() {
			if ("<?= $arResult["ID"]?>" == "offeredit") {
				var offerId = $(this).data('offer-edit-id') || $(this).data('offer-decline-id');

				var url = IntervolgaCustom.AjaxComponentCompany.List.list.offeredit.__url;
				if (url.indexOf("?") == -1) {
					url += "?OFFER_ID=" + offerId;
				}
				else {
					url += "&OFFER_ID=" + offerId;
				}

				IntervolgaCustom.AjaxComponentCompany.List.list.offeredit.__url = url;
				IntervolgaCustom.AjaxComponentCompany.List.list.offeredit.offerID = offerId;
			}

			IntervolgaCustom.AjaxComponentCompany.List.call("<?=$arResult["ID"]?>");

			return false;
		});

	});
</script>