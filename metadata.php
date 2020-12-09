<?php

$sMetadataVersion = '2.0';

$aModule = array(
    'id'           => 'agpopup',
    'title'        => 'Popup',
    'description'  => 'Show a popup when a user visits your page',
    'thumbnail'    => '',
    'version'      => '1.0.1',
    'author'       => 'Aggrosoft GmbH',
    'extend'      => array(
        \OxidEsales\Eshop\Core\ViewConfig::class => Aggrosoft\Popup\Core\ViewConfig::class,
    ),
    'settings' => array(
        array('group' => 'agpopup_settings', 'name' => 'iCookieLifetime',  'type' => 'str',   'value' => '1'),
        array('group' => 'agpopup_settings', 'name' => 'aPopupControllers',  'type' => 'arr',   'value' => ['*']),
        array('group' => 'agpopup_settings', 'name' => 'sPopupCmsIdent',  'type' => 'str',   'value' => ''),
    ),
    'templates' => array(
        'widget/popup/popup.tpl' => 'agpopup/Application/views/tpl/widget/popup/popup.tpl',
    ),
    'blocks' => array(
        [
            'template' => 'layout/base.tpl',
            'block' => 'base_js',
            'file' => '/views/blocks/base_js.tpl'
        ]
    )
);
