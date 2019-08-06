<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */

/**
 * Class Orba_Facebook_Model_Login
 */
class Orba_Facebook_Model_Login extends Mage_Core_Model_Abstract
{
    /**
     * @var null
     */
    protected $_fb = null;
    /**
     * @var null
     */
    protected $_customer = null;
    /**
     * @var null
     */
    protected $_session = null;

    /**
     * @throws Mage_Core_Exception
     * @throws Varien_Exception
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_customer = Mage::getSingleton('customer/customer');
        $this->_customer->setWebsiteId(Mage::app()->getWebsite()->getId());
        $this->_session = Mage::getSingleton('customer/session');
    }

    /**
     * @throws Varien_Exception
     */
    public function fblogin()
    {
        $this->_fb = Mage::getSingleton('facebook/facebook');
        if (!$this->_fb->getUserData()) return;
        if ($fb_user_id = $this->_fb->getUserData()->getField('id')) {
            $this->_setCustomer($fb_user_id);
            if (!Mage::helper('customer')->isLoggedIn()) {
                $this->_session->loginById($this->_customer->getId());
            }
        }
    }

    /**
     * @param $fb_user_id
     * @throws Varien_Exception
     */
    protected function _setCustomer($fb_user_id)
    {
        $customer = Mage::getSingleton('facebook/customer')->loadByFbUserId($fb_user_id);
        if (Mage::helper('customer')->isLoggedIn()) {
            $this->_customer = Mage::getSingleton('customer/session')->getCustomer();
            if (!$customer) {
                $this->_customer->setFbUserId($fb_user_id)->save();
            } else {
                if ($this->_customer->getId() != $customer->getId()) {
                    $customer->setFbUserId($fb_user_id . '_old')->save();
                    $this->_customer->setFbUserId($fb_user_id)->save();
                }
            }
        } else {
            if (!$customer) {
                $data = $this->_fb->getUserData();
                if ($this->_customer->loadByEmail($data->getField('email'))->getId()) {
                    $this->_customer->setFbUserId($data->getField('fb_user_id'))->save();
                } else {
                    $this->_registerCustomer($data);
                }
            } else {
                $this->_customer->load($customer->getId());
            }
        }
    }

    /**
     * @param $data
     * @throws Mage_Core_Model_Store_Exception
     */
    protected function _registerCustomer($data)
    {
        $this->_customer->setEmail($data->getField('email'))
            ->setFirstname($data->getField('first_name'))
            ->setLastname($data->getField('last_name'))
            ->setPassword(Mage::helper('facebook')->getRandomPassword())
            ->setFbUserId($data->getField('id'))
            ->save()
            ->setConfirmation(null)
            ->save()
            ->sendNewAccountEmail('registered', '', $storeId = Mage::app()->getStore(true));
    }


}