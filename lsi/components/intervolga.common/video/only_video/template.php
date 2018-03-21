<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);

foreach ($arResult["ITEMS"] as $arVideo): ?>
    <div class="video-<?=$arVideo["PROVIDER"]?> center-block" id="<?=$arVideo["ID"]?>"
         data-width="<?= $arParams["WIDTH"] ?>" data-height="<?= $arParams["HEIGHT"] ?>"
         data-provider="<?=$arVideo["PROVIDER"]?>" data-src="<?=$arVideo["SRC"]?>">
        <?
        if($arVideo["PROVIDER"] === 'youtube'){
            ?>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="<?=$arVideo["SRC"]?>" class="embed-responsive-item" autoplay="0"></iframe>
            </div>
            <?
        }elseif($arVideo["PROVIDER"] === 'local'){
            ?>
            <script>
                $(function(){
                    jwplayer(playerHolder.attr('id')).setup({
                        file: "<?=$arVideo["SRC"]?>",
                        height: "<?= $arParams["HEIGHT"] ?>"t,
                        width: "<?= $arParams["WIDTH"] ?>",
                        dock: true,
                        autostart: true,
                        players: [
                            {type: "html5"},
                            {type: "flash", src: "/bitrix/components/bitrix/player/mediaplayer/player"},
                        ],
                        controlbar: 'over',
                        'logo.hide': true,
                        skin:'/bitrix/components/bitrix/player/mediaplayer/skins/bekle/bekle.zip'
                    });
                });
            </script>
            <?
        }
        ?>
    </div>
<? endforeach ?>
