<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<div class="menu-top">
    <bottom class="menu-bar menu-top__btn" type="button">
        <div class="menu-bar__icon"></div>
        <div class="menu-bar__icon"></div>
        <div class="menu-bar__icon"></div>
    </bottom>
    <div class="menu-top__wrap">
        <div class="menu-top__item dropdown" data-cities-top>
            <a
                id="CityButton"
                class="menu-top__link menu-top__link_arrow_none menu-top__link_popover"
                href="#select-city"
                data-toggle="modal"
                data-content="<div class='nowrap'>Это ваш город? <div><a id='YES_CITY' class='btn btn-primary btn-xs' href='#'>Да</a> <a id='NO_CITY' class='btn btn-default btn-xs' href='#'>Нет</a></div></div>"
            >
                <i class="fa fa-map-marker text-danger"></i> <span><?=$arResult['CURRENT_CITY']['UF_NNOMINATIVUS']?></span>
            </a>
        </div>
        <?
        if(!empty($arResult['SHOPS'])) {
            ?>
            <div class="menu-top__item dropdown" data-shops-top>
                <a class="menu-top__link" href="#" data-toggle="dropdown"><?=\Intervolga\Custom\City::currentIsDefault() ? 'Магазины' : 'Пункты выдачи'?></a>
                <ul class="dropdown-menu dropdown-menu_ul">
                    <?
                    foreach($arResult['SHOPS'] as $shop) {
                        ?>
                        <li class="dropdown-menu__li"><a class="dropdown-menu__link" href="<?=$shop['DETAIL_PAGE_URL']?>"><?=$shop['NAME']?></a></li>
                        <?
                    }
                    ?>
                </ul>
            </div>
            <?
        }
        ?>
    </div>
</div>
<script>
   var CityOb = new City();
   CityOb.init("<?= $arResult['CURRENT_CITY']['UF_XML_ID']?>", "<?= $this->__component->GetPath() . '/ajax.php'?>")
</script>

<?Intervolga\Custom\SiteTools::beginModal('CityModal') ?>
    <div class="modal fade" id="select-city" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal__title">Выберите ваш город</div>
                    <div class="modal__close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></div>
                </div>
                <div class="modal-body">
                    <div class="columns-radio">
                        <?
                        foreach ($arResult['CITIES'] as $city) {
                            ?>
                            <div class="pvx">
                                <div class="radio radio_custom">
                                    <label><input class="radio__control" <?= $city['ID'] == $arResult['CURRENT_CITY']['ID'] ? 'checked' : ''?> type="radio" name="CITY" value="<?=$city['URL']?>" data-city-xml="<?= $city['UF_XML_ID']?>"/><span class="radio__input"></span><?=$city['UF_NNOMINATIVUS']?></label>
                                </div>
                            </div>
                            <?
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-primary" data-ok>Применить</button></div>
            </div>
        </div>
    </div>
<?Intervolga\Custom\SiteTools::endModal() ?>