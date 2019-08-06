<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */

/**
 * Class Orba_Facebook_Model_Observer
 */
class Orba_Facebook_Model_Observer extends Mage_Core_Model_Abstract {

    /**
     * @throws Varien_Exception
     */
    public function manageTopLinks() {
        if (Mage::helper('facebook')->isActive() && Mage::helper('facebook')->isConnectActive()) {
            if ($top_links = Mage::app('base')->getLayout()->getBlock('top.links')) {
                if (Mage::helper('facebook')->getAddConnectToTopLinks()) {
                    if (!Mage::helper('customer')->isLoggedIn()) {
                        $top_links->addLink(Mage::helper('facebook')->__('Login with Facebook'), Mage::helper('facebook')->getLoginUrl());
                    }
                }
            }
        }
    }

    /**
     * Remove facebook session
     */
    public function removeFacebookSession() {
        $app_id = Mage::helper('facebook')->getAppId();
        $_SESSION['fb_'.$app_id.'_user_id'] = '';
        $_SESSION['fb_'.$app_id.'_access_token'] = '';
        $_SESSION['fb_'.$app_id.'_code'] = '';
    }
    
}