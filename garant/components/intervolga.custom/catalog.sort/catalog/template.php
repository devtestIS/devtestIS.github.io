<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Localization\Loc;
?>

<div class="filter-controls__sort" id="sort-panel">
    <div class="filter-controls__li hidden-xs"><?= Loc::getMessage('ORDER_BY') ?></div>
    <? foreach ($arResult['FIELDS'] as $arField): ?>
        <div class="filter-controls__li">
            <div class="switch"><a href="<?= $arField['URL'] ?>"><span class="switch__over <?if($arField['SELECTED_DIRECTION'] == 'ASC') echo 'switch__over_up'?>"></span><?= $arField['NAME'] ?></a></div>
        </div>
    <? endforeach; ?>
</div>
