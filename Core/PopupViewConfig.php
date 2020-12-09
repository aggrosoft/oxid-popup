<?php

namespace Aggrosoft\Popup\Core;

use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Configuration\Bridge\ModuleSettingBridgeInterface;

class PopupViewConfig extends PopupViewConfig_parent
{
    public function showPopup ()
    {
        if ($_COOKIE['agpopupshown']) {
            return false;
        }

        $moduleSettingBridge = ContainerFactory::getInstance()
            ->getContainer()
            ->get(ModuleSettingBridgeInterface::class);
        $aControllers = $moduleSettingBridge->get('aPopupControllers', 'agpopup');
        $sCmsContentIdent = $moduleSettingBridge->get('sPopupCmsIdent', 'agpopup');
        $sClass = $this->getTopActiveClassName();

        return $sCmsContentIdent && (in_array('*', $aControllers) || in_array($sClass, $aControllers));
    }

    public function getPopupCmsIdent ()
    {
        $moduleSettingBridge = ContainerFactory::getInstance()
            ->getContainer()
            ->get(ModuleSettingBridgeInterface::class);
        return $moduleSettingBridge->get('sPopupCmsIdent', 'agpopup');
    }

    public function getPopupCookieLifetime ()
    {
        $moduleSettingBridge = ContainerFactory::getInstance()
            ->getContainer()
            ->get(ModuleSettingBridgeInterface::class);
        return $moduleSettingBridge->get('iCookieLifetime', 'agpopup');
    }
}