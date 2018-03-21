<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div>
    <div class="slider-article" data-ex="1" data-xs="1" data-sm="2" data-md="3" data-lg="3">
        <?
        foreach($arResult["ITEMS"] as $arItem){
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <a class="slider-article__item" href="<?=$arItem["DETAIL_PAGE_URL"]?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="slider-article__inner">
                    <?
                    if($arItem["PREVIEW_PICTURE"]['SRC']) {
                        ?>
                        <div class="slider-article__image"><img class="img img-responsive"
                                                                src="<?= $arItem["PREVIEW_PICTURE"]['SRC'] ?>"
                                                                alt="<?= $arItem["NAME"] ?>"
                                                                title="<?= $arItem["TITLE"] ?>"/></div>
                        <?
                    }
                    ?>
                    <div class="slider-article__body">
                        <div class="slider-article__title" data-dotdotdot="true"><?=$arItem["NAME"]?></div>
                        <div class="slider-article__description" data-dotdotdot="true"><?=strip_tags($arItem["PREVIEW_TEXT"])?></div>
                    </div>
                </div>
            </a>
            <?
        }
        ?>
    </div>
</div>
