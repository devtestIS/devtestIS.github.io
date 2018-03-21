<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var CBitrixComponentTemplate $this
 */
$this->addExternalJs("/local/js/intervolga.custom/ajax.component-company/component.js");
$this->addExternalJs("/local/js/intervolga.custom/ajax.component-company/list.js");
$this->addExternalJs("/local/js/intervolga.custom/ajax.component-company/modal.js");
?>
<? if ($arParams["SHOW_BUTTON"] == "Y"): ?>
	<a class="change-button" href="javascript:void(0)" data-href="<?=$arResult["AJAX_VIEW_LINK"]?>" id="link<?=$arResult["ID"]?>" data-target="#<?=$arResult["ID"]?>">
		<?=$arParams["TITLE"]?>
	</a>
<? endif ?>
<?ob_start();?>
<div class="modal fade in modal-ajax-component" id="<?=$arResult["ID"]?>" tabindex="-1" role="dialog" aria-labelledby="<?=$arResult["LINK_ID"]?>" aria-hidden="true">
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
<?$APPLICATION->AddViewContent('company_edit', ob_get_clean())?>

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

		$("#link<?=$arResult["ID"]?>").on("click", function() {
			IntervolgaCustom.AjaxComponentCompany.List.call("<?=$arResult["ID"]?>");
			return false;
		});

		$("[data-target='#<?=$arResult["ID"]?>']").on("click", function() {
			if ("<?= $arResult["ID"]?>" == "companyedit") {
				var companyID = $(this).data('company-decline-id');

				var url = IntervolgaCustom.AjaxComponentCompany.List.list.companyedit.__url;
				if (url.indexOf("?") == -1) {
					url += "?COMPANY_ID=" + companyID;
				}
				else {
					url += "&COMPANY_ID=" + companyID;
				}

				IntervolgaCustom.AjaxComponentCompany.List.list.companyedit.__url = url;
				IntervolgaCustom.AjaxComponentCompany.List.list.companyedit.companyID = companyID;
			}

			IntervolgaCustom.AjaxComponentCompany.List.call("<?=$arResult["ID"]?>");

			return false;
		});
	});
</script>