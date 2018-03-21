<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<div class="search-large search-large_color_lite">
	<form class="search-large__inner" action="<?=$arResult["FORM_ACTION"]?>">
		<input class="form-control" placeholder="<?=GetMessage("BSF_T_SEARCH_PLACEHOLDER");?>" type="text" name="q" />
		<i class="icomoon hidden-xs icon icon-search"></i>
		<button class="btn btn-info text-uppercase" data-bem-repaced="btn_color_info" type="submit" name="s" >
			<span class="span hidden-xs"><?=GetMessage("BSF_T_SEARCH_BUTTON");?></span>
			<i class="icomoon visible-xs icon icon-search"></i>
		</button>
	</form>
</div>