<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var array $arResult
 * @var array $arParams
 */
$this->setFrameMode(true);
?>
<?if(!empty($arResult["ITEMS"])):?>
    <div class="title-line">
        <div class="title-line__title"><?=$arParams['FILT_TITLE']?></div>
        <?
        if ($arParams['FILT_LINK']) {
            ?>
            <a class="title-line__link" href="<?=$arParams['FILT_LINK']?>"><?=$arParams['FILT_LINK_TITLE']
                    ?: 'Посмотреть все'?></a>
            <?
        }
        ?>
    </div>
    <div class="slider-product-line" data-speed="<?=$arParams["SLIDER_TIME"]?>">
        <?
        foreach($arResult["ITEMS"] as $arItem){
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $strMainID = $this->GetEditAreaId($arItem['ID']);
            ?>
            <a class="slider-product-line__item" href="<?=$arItem['DETAIL_PAGE_URL']?>">
                <div class="catalog-tile" id="<?=$strMainID?>">
                    <div class="catalog-tile__image">
                        <img class="img-responsive"
                          src="<?=$arItem['DETAIL_PICTURE']['SRC']?>"
                          alt="<?=$arItem['DETAIL_PICTURE']['ALT']?>"
                          title="<?=$arItem['DETAIL_PICTURE']['TITLE']?>"/>
                    </div>
                    <div class="catalog-tile__title" data-dotdotdot="true"><?=$arItem['NAME']?></div>
                </div>
            </a>
        <?}?>
    </div>
<?endif;?>