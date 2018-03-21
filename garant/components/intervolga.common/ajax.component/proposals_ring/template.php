<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var CBitrixComponentTemplate $this
 */
$this->addExternalJs("/local/js/intervolga.common/ajax.component/component.js");
$this->addExternalJs("/local/js/intervolga.common/ajax.component/list.js");
$this->addExternalJs("/local/js/intervolga.common/ajax.component/modal.js");
?>
<? if ($arParams["SHOW_BUTTON"] == "Y"): ?>
	<div class="footer__col">
		<button class="btn btn-info text-uppercase" type="submit" data-href="<?=$arResult["AJAX_VIEW_LINK"]?>" id="link<?=$arResult["ID"]?>" data-target="#<?=$arResult["ID"]?>"><?=$arParams["TITLE"]?></button>
	</div>
<? endif ?>
<?ob_start();?>
<div class="modal fade modal-ajax-component" id="<?=$arResult["ID"]?>" tabindex="-1" role="dialog" aria-labelledby="<?=$arResult["LINK_ID"]?>" aria-hidden="true">
	<div class="modal-dialog <?=$arParams["SIZE"]?>">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$arParams["TITLE"]?></h4>
			</div>
			<div class="modal-body">
				<img src="<?=$templateFolder?>/images/loading.gif" alt="" class="img-responsive center-block">
			</div>
		</div>
	</div>
</div>
<?$APPLICATION->AddViewContent('after_body', ob_get_clean())?>
<script type="text/javascript">
	$(document).ready(function () {
		var ajaxComponent = new IntervolgaCommon.AjaxComponent.Component({
			url: "<?=$arResult["AJAX_VIEW_LINK"]?>",
			id: "<?=$arResult["ID"]?>",
			varName: "<?=$arParams["COMPONENT_ID_REQUEST_NAME"]?>",
			checkHeader: "<?=$arResult["CHECK_HEADER"]?>",
			/**
			 * @param {IntervolgaCommon.AjaxComponent.Component} component
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
		IntervolgaCommon.AjaxComponent.List.add(ajaxComponent);
		new IntervolgaCommon.AjaxComponent.Modal(ajaxComponent).bindHandlers();

		$("#link<?=$arResult["ID"]?>").on("click", function() {
			IntervolgaCommon.AjaxComponent.List.call("<?=$arResult["ID"]?>");
			return false;
		});
	});
</script>