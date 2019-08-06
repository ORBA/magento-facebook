<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */

class Orba_Facebook_IndexController extends Mage_Core_Controller_Front_Action
{


    /**
     * Pre dispatch
     *
     * @return Mage_Core_Controller_Front_Action|void
     */
    public function preDispatch()
    {
        parent::preDispatch();

        $isConnectActive = Mage::helper('facebook')->isConnectActive();
        $facebookAppActive = Mage::helper('facebook')->isActive();

        if (!$facebookAppActive || !$isConnectActive) {
            $this->setFlag('', 'no-dispatch', true);
            $this->_redirect('noRoute');
        }
    }


    /**
     * @return Mage_Core_Controller_Varien_Action
     * @throws Varien_Exception
     */
    function fbloginAction()
    {
        $code = $this->getRequest()->getParam('code');
        if ($code) {
            try {
                $model = Mage::getSingleton('facebook/facebook')->getUserData();
                if (!$model) {
                    Mage::throwException($this->__("Can't connect with Facebook."));
                }
                $userEmail = $model->getField('email');
                if (!$userEmail){
                    Mage::throwException($this->__("You don't have an email address in your Facebook account. Please add an email address to Facebook account and try again."));
                }
                Mage::getModel('facebook/login')->fblogin();

            } catch (Mage_Core_Exception $e) {
                Mage::logException($e);
                Mage::getSingleton('core/session')->addException($e, $this->__('There was a problem with Facebook Login: %s', $e->getMessage()));
            }

        }
        return $this->_redirect(Mage_Customer_Helper_Data::ROUTE_ACCOUNT_LOGIN);
    }
}