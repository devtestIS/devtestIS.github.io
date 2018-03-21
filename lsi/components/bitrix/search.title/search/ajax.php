<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(!empty($arResult["CATEGORIES"])):?>
    <div class="search-popover popover bottom search-title-popover">
        <?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>
            <?if($category_id === "all") { continue; } ?>

            <?if(count($arCategory["ITEMS"])):?>
                <?if($arResult['SEARCH_COUNTER']['SECTIONS'] > 0):?>
                    <div class="search-popover__content">
                        <div class="search-popover__title">Категории</div>
                        <ul class="search-popover__list">
                            <?foreach($arCategory["ITEMS"] as $i => $arItem):?>
                                <?
                                if(stripos($arItem["ITEM_ID"], 'S')!==0){
                                    continue;
                                }
                                ?>
                                <li class="search-popover__li">
                                    <a class="search-popover__link" href="<?=$arItem["URL"]?>"><?=$arItem["NAME"]?></a>
                                </li>
                            <?endforeach;?>
                        </ul>
                    </div>
                <?endif;?>
                <?if($arResult['SEARCH_COUNTER']['ELEMENTS'] > 0):?>
                    <div class="search-popover__content">
                        <div class="search-popover__title">Товары</div>
                        <ul class="search-popover__list">
                            <?foreach($arCategory["ITEMS"] as $i => $arItem):?>
                                <?
                                if(stripos($arItem["ITEM_ID"], 'S')===0 || !isset($arItem['ELEMENT'])){
                                    continue;
                                }
                                ?>
                                <li class="search-popover__li">
                                    <a class="search-popover__link-img clearfix" href="<?=$arItem["URL"]?>">
                                        <?if($arItem["ELEMENT"]['DETAIL_PICTURE']['src']):?>
                                            <img src="<?=$arItem["ELEMENT"]['DETAIL_PICTURE']['src']?>" />
                                        <?endif;?>
                                        <div class="search-popover__link-img-text"><?=$arItem["NAME"]?></div>
                                    </a>
                                </li>
                            <?endforeach;?>
                        </ul>
                    </div>
                <?endif;?>
            <?endif;?>
        <?endforeach;?>
        </div>
    </div>
<?endif;?>