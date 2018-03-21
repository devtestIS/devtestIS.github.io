module.exports = {
    
    // РџРµСЂРµРєР»СЋС‡Р°С‚РµР»СЊ production/development СЂРµР¶РёРјР°
    "production": false,
    
    // РЎРїРёСЃРѕРє СЏР·С‹РєРѕРІ РЅР° РєРѕС‚РѕСЂС‹С… СЂР°Р±РѕС‚Р°РµС‚ СЃР°Р№С‚.
    // РСЃРїРѕР»СЊР·СѓРµС‚СЃСЏ РґР»СЏ СЃР±РѕСЂРєРё i18n РёР· JS-РїР»Р°РіРёРЅРѕРІ.
    "languages": [
        "ru"
    ],
    
    // Р—РЅР°С‡РµРЅРёРµ РїРµСЂРµРјРµРЅРЅРѕР№ responsive РїРµСЂРµРґР°РµС‚СЃСЏ РІ SASS-РєРѕРјРїРёР»СЏС‚РѕСЂ Рё BH-С€Р°Р±Р»РѕРЅРёР·Р°С‚РѕСЂ
    "responsive": true,
    
    // РЈСЂРѕРІРЅРё РїРµСЂРµРѕРїСЂРµРґРµР»РµРЅРёСЏ Р‘Р­Рњ. РњРѕР¶РЅРѕ РёСЃРїРѕР»СЊР·РѕРІР°С‚СЊ СЃРёРЅС‚Р°РєСЃРёСЃ:
    // Р°) "bem/blocks.05-project" - Р±Р»РѕРє Р±СѓРґРµС‚ РїСЂРѕРІРµСЂСЏС‚СЊСЃСЏ РЅР° РёР·РјРµРЅРµРЅРёСЏ РІСЃРµРіРґР°
    // Р±) { "path": "bem/blocks.05-project", "check": false }, - Р±Р»РѕРє Р±СѓРґРµС‚ РїСЂРѕРІРµСЂСЏС‚СЊСЃСЏ РЅР° РёР·РјРµРЅРµРЅРёСЏ С‚РѕР»СЊРєРѕ РµСЃР»Рё "check": true
    "levels": [
        {
            "path": "bem/blocks.01-base",
            "check": false
        },
        {
            "path": "bem/blocks.02-plugins",
            "check": false
        },
        {
            "path": "bem/blocks.02-plugins-jquery-ui",
            "check": false
        },
        {
            "path": "bem/blocks.02-plugins-libraries",
            "check": true
        },
        {
            "path": "bem/blocks.03-fonts",
            "check": true
        },
        "bem/blocks.04-common",
        "bem/blocks.05-project"
    ],
    
    // РџРѕРґРґРµСЂР¶РёРІР°РµРјС‹Рµ Р±СЂР°СѓР·РµСЂС‹ (РёСЃРїРѕР»СЊР·СѓСЋС‚СЃСЏ РїСЂРё СЂР°СЃСЃС‚Р°РЅРѕРІРєРµ РїСЂРµС„РёРєСЃРѕРІ РІ CSS)
    "browsers": [
        "Explorer >= 8",
        "Firefox >= 4",
        "Opera >= 12",
        "Chrome >= 15",
        "Safari >= 5",
        "Android 2.3",
        "Android >= 4",
        "iOS >= 6"
    ],
    
    // РЎРїРёСЃРѕРє Р·Р°РјРµРЅ РґР»СЏ BEM-РєР»Р°СЃСЃРѕРІ.
    // РСЃРїРѕР»СЊР·РѕРІР°С‚СЊ РІ РєСЂР°Р№РЅРёС… СЃР»СѓС‡Р°СЏС… РєРѕРіРґР° РЅРµ РїРѕР»СѓС‡Р°РµС‚СЃСЏ РїРµСЂРµСЃС‚СЂРѕРёС‚СЊ
    // РёРјРµРЅР° РєР»Р°СЃСЃРѕРІ, РЅР°РїСЂРёРјРµСЂ РґР»СЏ Bootstrap
    "replacements": {
        // http://getbootstrap.com/css/#buttons
        'btn_color_default': 'btn-default',
        'btn_color_primary': 'btn-primary',
        'btn_color_success': 'btn-success',
        'btn_color_info': 'btn-info',
        'btn_color_warning': 'btn-warning',
        'btn_color_danger': 'btn-danger',
        'btn_color_link': 'btn-link',
        
        'btn_size_lg': 'btn-lg',
        'btn_size_sm': 'btn-sm',
        'btn_size_xs': 'btn-xs',
        
        'btn_block': 'btn-block',
        
        'btn_link': 'btn-link',
        
        'btn_state_active': '',
        'btn_state_disabled': '',
        
        
        // http://getbootstrap.com/components/#alerts
        'alert_color_success': 'alert-success',
        'alert_color_info': 'alert-info',
        'alert_color_warning': 'alert-warning',
        'alert_color_danger': 'alert-danger',
        
        'alert_dismissible': 'alert-dismissible',
        
        
        // modal
        'modal__dialog': 'modal-dialog',
        'modal__dialog_size_lg': 'modal-lg',
        'modal__dialog_size_sm': 'modal-sm',
        'modal__dialog_size_xs': 'modal-xs',
        'modal__content': 'modal-content',
        'modal__body': 'modal-body',
        'modal__header': 'modal-header',
        'modal__footer': 'modal-footer',
        // input
        'input_control': 'form-control',
        
        // lable
        'label_sr-only': 'sr-only',
        
        // tab
        'nav-tabs__item_active': 'active',
        'tab-content__item': 'tab-pane',
        'tab-content__item_active': 'in active',
        
        // ul list
        'ul_unstyled': 'list-unstyled',
        
        // http://getbootstrap.com/css/#grid
        'container': '', // РҐР°Рє, СЃРј. СЂРµР°Р»РёР·Р°С†РёСЋ РІ bh
        'container_fluid_off': 'container',
        'container_fluid': 'container-fluid',
        
        'row__col': '',
        
        'row__col_xs_1': 'col-xs-1',
        'row__col_xs_2': 'col-xs-2',
        'row__col_xs_3': 'col-xs-3',
        'row__col_xs_4': 'col-xs-4',
        'row__col_xs_5': 'col-xs-5',
        'row__col_xs_6': 'col-xs-6',
        'row__col_xs_7': 'col-xs-7',
        'row__col_xs_8': 'col-xs-8',
        'row__col_xs_9': 'col-xs-9',
        'row__col_xs_10': 'col-xs-10',
        'row__col_xs_11': 'col-xs-11',
        'row__col_xs_12': 'col-xs-12',
        'row__col_xs-clear': '',
        'row__col_xs-offset_0': 'col-xs-offset-0',
        'row__col_xs-offset_1': 'col-xs-offset-1',
        'row__col_xs-offset_2': 'col-xs-offset-2',
        'row__col_xs-offset_3': 'col-xs-offset-3',
        'row__col_xs-offset_4': 'col-xs-offset-4',
        'row__col_xs-offset_5': 'col-xs-offset-5',
        'row__col_xs-offset_6': 'col-xs-offset-6',
        'row__col_xs-offset_7': 'col-xs-offset-7',
        'row__col_xs-offset_8': 'col-xs-offset-8',
        'row__col_xs-offset_9': 'col-xs-offset-9',
        'row__col_xs-offset_10': 'col-xs-offset-10',
        'row__col_xs-offset_11': 'col-xs-offset-11',
        'row__col_xs-offset_12': 'col-xs-offset-12',
        'row__col_xs-pull_0': 'col-xs-pull-0',
        'row__col_xs-pull_1': 'col-xs-pull-1',
        'row__col_xs-pull_2': 'col-xs-pull-2',
        'row__col_xs-pull_3': 'col-xs-pull-3',
        'row__col_xs-pull_4': 'col-xs-pull-4',
        'row__col_xs-pull_5': 'col-xs-pull-5',
        'row__col_xs-pull_6': 'col-xs-pull-6',
        'row__col_xs-pull_7': 'col-xs-pull-7',
        'row__col_xs-pull_8': 'col-xs-pull-8',
        'row__col_xs-pull_9': 'col-xs-pull-9',
        'row__col_xs-pull_10': 'col-xs-pull-10',
        'row__col_xs-pull_11': 'col-xs-pull-11',
        'row__col_xs-pull_12': 'col-xs-pull-12',
        'row__col_xs-push_0': 'col-xs-push-0',
        'row__col_xs-push_1': 'col-xs-push-1',
        'row__col_xs-push_2': 'col-xs-push-2',
        'row__col_xs-push_3': 'col-xs-push-3',
        'row__col_xs-push_4': 'col-xs-push-4',
        'row__col_xs-push_5': 'col-xs-push-5',
        'row__col_xs-push_6': 'col-xs-push-6',
        'row__col_xs-push_7': 'col-xs-push-7',
        'row__col_xs-push_8': 'col-xs-push-8',
        'row__col_xs-push_9': 'col-xs-push-9',
        'row__col_xs-push_10': 'col-xs-push-10',
        'row__col_xs-push_11': 'col-xs-push-11',
        'row__col_xs-push_12': 'col-xs-push-12',
        
        'row__col_sm_1': 'col-sm-1',
        'row__col_sm_2': 'col-sm-2',
        'row__col_sm_3': 'col-sm-3',
        'row__col_sm_4': 'col-sm-4',
        'row__col_sm_5': 'col-sm-5',
        'row__col_sm_6': 'col-sm-6',
        'row__col_sm_7': 'col-sm-7',
        'row__col_sm_8': 'col-sm-8',
        'row__col_sm_9': 'col-sm-9',
        'row__col_sm_10': 'col-sm-10',
        'row__col_sm_11': 'col-sm-11',
        'row__col_sm_12': 'col-sm-12',
        'row__col_sm-clear': '',
        'row__col_sm-offset_0': 'col-sm-offset-0',
        'row__col_sm-offset_1': 'col-sm-offset-1',
        'row__col_sm-offset_2': 'col-sm-offset-2',
        'row__col_sm-offset_3': 'col-sm-offset-3',
        'row__col_sm-offset_4': 'col-sm-offset-4',
        'row__col_sm-offset_5': 'col-sm-offset-5',
        'row__col_sm-offset_6': 'col-sm-offset-6',
        'row__col_sm-offset_7': 'col-sm-offset-7',
        'row__col_sm-offset_8': 'col-sm-offset-8',
        'row__col_sm-offset_9': 'col-sm-offset-9',
        'row__col_sm-offset_10': 'col-sm-offset-10',
        'row__col_sm-offset_11': 'col-sm-offset-11',
        'row__col_sm-offset_12': 'col-sm-offset-12',
        'row__col_sm-pull_0': 'col-sm-pull-0',
        'row__col_sm-pull_1': 'col-sm-pull-1',
        'row__col_sm-pull_2': 'col-sm-pull-2',
        'row__col_sm-pull_3': 'col-sm-pull-3',
        'row__col_sm-pull_4': 'col-sm-pull-4',
        'row__col_sm-pull_5': 'col-sm-pull-5',
        'row__col_sm-pull_6': 'col-sm-pull-6',
        'row__col_sm-pull_7': 'col-sm-pull-7',
        'row__col_sm-pull_8': 'col-sm-pull-8',
        'row__col_sm-pull_9': 'col-sm-pull-9',
        'row__col_sm-pull_10': 'col-sm-pull-10',
        'row__col_sm-pull_11': 'col-sm-pull-11',
        'row__col_sm-pull_12': 'col-sm-pull-12',
        'row__col_sm-push_0': 'col-sm-push-0',
        'row__col_sm-push_1': 'col-sm-push-1',
        'row__col_sm-push_2': 'col-sm-push-2',
        'row__col_sm-push_3': 'col-sm-push-3',
        'row__col_sm-push_4': 'col-sm-push-4',
        'row__col_sm-push_5': 'col-sm-push-5',
        'row__col_sm-push_6': 'col-sm-push-6',
        'row__col_sm-push_7': 'col-sm-push-7',
        'row__col_sm-push_8': 'col-sm-push-8',
        'row__col_sm-push_9': 'col-sm-push-9',
        'row__col_sm-push_10': 'col-sm-push-10',
        'row__col_sm-push_11': 'col-sm-push-11',
        'row__col_sm-push_12': 'col-sm-push-12',
        
        'row__col_md_1': 'col-md-1',
        'row__col_md_2': 'col-md-2',
        'row__col_md_3': 'col-md-3',
        'row__col_md_4': 'col-md-4',
        'row__col_md_5': 'col-md-5',
        'row__col_md_6': 'col-md-6',
        'row__col_md_7': 'col-md-7',
        'row__col_md_8': 'col-md-8',
        'row__col_md_9': 'col-md-9',
        'row__col_md_10': 'col-md-10',
        'row__col_md_11': 'col-md-11',
        'row__col_md_12': 'col-md-12',
        'row__col_md-clear': '',
        'row__col_md-offset_0': 'col-md-offset-0',
        'row__col_md-offset_1': 'col-md-offset-1',
        'row__col_md-offset_2': 'col-md-offset-2',
        'row__col_md-offset_3': 'col-md-offset-3',
        'row__col_md-offset_4': 'col-md-offset-4',
        'row__col_md-offset_5': 'col-md-offset-5',
        'row__col_md-offset_6': 'col-md-offset-6',
        'row__col_md-offset_7': 'col-md-offset-7',
        'row__col_md-offset_8': 'col-md-offset-8',
        'row__col_md-offset_9': 'col-md-offset-9',
        'row__col_md-offset_10': 'col-md-offset-10',
        'row__col_md-offset_11': 'col-md-offset-11',
        'row__col_md-offset_12': 'col-md-offset-12',
        'row__col_md-pull_0': 'col-md-pull-0',
        'row__col_md-pull_1': 'col-md-pull-1',
        'row__col_md-pull_2': 'col-md-pull-2',
        'row__col_md-pull_3': 'col-md-pull-3',
        'row__col_md-pull_4': 'col-md-pull-4',
        'row__col_md-pull_5': 'col-md-pull-5',
        'row__col_md-pull_6': 'col-md-pull-6',
        'row__col_md-pull_7': 'col-md-pull-7',
        'row__col_md-pull_8': 'col-md-pull-8',
        'row__col_md-pull_9': 'col-md-pull-9',
        'row__col_md-pull_10': 'col-md-pull-10',
        'row__col_md-pull_11': 'col-md-pull-11',
        'row__col_md-pull_12': 'col-md-pull-12',
        'row__col_md-push_0': 'col-md-push-0',
        'row__col_md-push_1': 'col-md-push-1',
        'row__col_md-push_2': 'col-md-push-2',
        'row__col_md-push_3': 'col-md-push-3',
        'row__col_md-push_4': 'col-md-push-4',
        'row__col_md-push_5': 'col-md-push-5',
        'row__col_md-push_6': 'col-md-push-6',
        'row__col_md-push_7': 'col-md-push-7',
        'row__col_md-push_8': 'col-md-push-8',
        'row__col_md-push_9': 'col-md-push-9',
        'row__col_md-push_10': 'col-md-push-10',
        'row__col_md-push_11': 'col-md-push-11',
        'row__col_md-push_12': 'col-md-push-12',
        
        'row__col_lg_1': 'col-lg-1',
        'row__col_lg_2': 'col-lg-2',
        'row__col_lg_3': 'col-lg-3',
        'row__col_lg_4': 'col-lg-4',
        'row__col_lg_5': 'col-lg-5',
        'row__col_lg_6': 'col-lg-6',
        'row__col_lg_7': 'col-lg-7',
        'row__col_lg_8': 'col-lg-8',
        'row__col_lg_9': 'col-lg-9',
        'row__col_lg_10': 'col-lg-10',
        'row__col_lg_11': 'col-lg-11',
        'row__col_lg_12': 'col-lg-12',
        'row__col_lg-clear': '',
        'row__col_lg-offset_0': 'col-lg-offset-0',
        'row__col_lg-offset_1': 'col-lg-offset-1',
        'row__col_lg-offset_2': 'col-lg-offset-2',
        'row__col_lg-offset_3': 'col-lg-offset-3',
        'row__col_lg-offset_4': 'col-lg-offset-4',
        'row__col_lg-offset_5': 'col-lg-offset-5',
        'row__col_lg-offset_6': 'col-lg-offset-6',
        'row__col_lg-offset_7': 'col-lg-offset-7',
        'row__col_lg-offset_8': 'col-lg-offset-8',
        'row__col_lg-offset_9': 'col-lg-offset-9',
        'row__col_lg-offset_10': 'col-lg-offset-10',
        'row__col_lg-offset_11': 'col-lg-offset-11',
        'row__col_lg-offset_12': 'col-lg-offset-12',
        'row__col_lg-pull_0': 'col-lg-pull-0',
        'row__col_lg-pull_1': 'col-lg-pull-1',
        'row__col_lg-pull_2': 'col-lg-pull-2',
        'row__col_lg-pull_3': 'col-lg-pull-3',
        'row__col_lg-pull_4': 'col-lg-pull-4',
        'row__col_lg-pull_5': 'col-lg-pull-5',
        'row__col_lg-pull_6': 'col-lg-pull-6',
        'row__col_lg-pull_7': 'col-lg-pull-7',
        'row__col_lg-pull_8': 'col-lg-pull-8',
        'row__col_lg-pull_9': 'col-lg-pull-9',
        'row__col_lg-pull_10': 'col-lg-pull-10',
        'row__col_lg-pull_11': 'col-lg-pull-11',
        'row__col_lg-pull_12': 'col-lg-pull-12',
        'row__col_lg-push_0': 'col-lg-push-0',
        'row__col_lg-push_1': 'col-lg-push-1',
        'row__col_lg-push_2': 'col-lg-push-2',
        'row__col_lg-push_3': 'col-lg-push-3',
        'row__col_lg-push_4': 'col-lg-push-4',
        'row__col_lg-push_5': 'col-lg-push-5',
        'row__col_lg-push_6': 'col-lg-push-6',
        'row__col_lg-push_7': 'col-lg-push-7',
        'row__col_lg-push_8': 'col-lg-push-8',
        'row__col_lg-push_9': 'col-lg-push-9',
        'row__col_lg-push_10': 'col-lg-push-10',
        'row__col_lg-push_11': 'col-lg-push-11',
        'row__col_lg-push_12': 'col-lg-push-12',
        
        
        // http://getbootstrap.com/components/#nav
        'nav_type_tabs': 'nav-tabs',
        'nav_type_pills': 'nav-pills',
        'nav_orientation_stacked': 'nav-stacked',
        'nav_orientation_justified': 'nav-justified',
        'nav__item': '',
        'nav__item_state_active': 'active',
        'nav__item_state_disabled': 'disabled',
        
    }
};