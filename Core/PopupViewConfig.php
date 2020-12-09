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

        $aControllers = $this->_getPopupSetting('aPopupControllers');
        $sCmsContentIdent = $this->_getPopupSetting('sPopupCmsIdent');
        $sClass = $this->getTopActiveClassName();

        return $sCmsContentIdent && (in_array('*', $aControllers) || in_array($sClass, $aControllers));
    }

    public function getPopupCmsIdent ()
    {
        return $this->_getPopupSetting('sPopupCmsIdent');
    }

    public function getPopupCookieLifetime ()
    {
        return $this->_getPopupSetting('iCookieLifetime');
    }

    protected function _getPopupSetting($setting) {
        if (class_exists('\OxidEsales\EshopCommunity\Internal\Container\ContainerFactory')){
            $moduleSettingBridge = ContainerFactory::getInstance()
                ->getContainer()
                ->get(ModuleSettingBridgeInterface::class);
            return $moduleSettingBridge->get($setting, 'agpopup');
        }else{
            $config = \OxidEsales\Eshop\Core\Registry::getConfig();
            $config->getShopConfVar($setting, null, 'agpopup');
        }
    }
}