<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */


/**
 * Class Orba_Facebook_Block_Init
 */
class Orba_Facebook_Block_Init extends Mage_Core_Block_Template {

    /**
     * @var null
     */
    var $fb = null;

    /**
     * Constructor
     */
    protected function _construct() {
        parent::_construct();
        if (Mage::helper('facebook')->isActive()) {
            $this->fb = Mage::getSingleton('facebook/facebook');
            $this->setTemplate('facebook/init.phtml');
        }
    }

    /**
     * @return mixed
     */
    public function getAppId() {
        return Mage::getStoreConfig('facebook/app/app_id');
    }

    /**
     * @return mixed
     * @throws Varien_Exception
     */
    public function getFBUserId() {
        return Mage::getSingleton('customer/session')->getCustomer()->getFbUserId();
    }

    /**
     * @return mixed
     * @throws Varien_Exception
     */
    public function getLogoutUrl() {
        return $this->helper('customer')->getLogoutUrl();
    }

    /**
     * @return string
     */
    public function getAutologinUrl() {
        return Mage::getUrl('facebook/index/autologin');
    }

    /**
     * @return mixed
     * @throws Varien_Exception
     */
    public function isLoggedIn() {
        return $this->helper('customer')->isLoggedIn();
    }

    /**
     * @return bool
     */
    public function isConnected() {
        return (bool)$this->fb->getUser();
    }
    
}