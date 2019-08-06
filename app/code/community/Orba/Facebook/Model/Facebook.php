<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */



/**
 * Class Orba_Facebook_Model_Facebook
 */
class Orba_Facebook_Model_Facebook extends Mage_Core_Model_Abstract
{
    /**
     * Required fields
     */
    const REQUIRED_FIELDS = 'name,email,first_name,last_name';
    /**
     * Service URL
     */
    const FB_SERVICE_URL = 'facebook/index/fblogin';
    /**
     * @var
     */
    protected $_fb;

    /**
     * @var
     */
    protected $_accessToken;
    /**
     * @var
     */
    protected $_userData;


    /**
     * @return \Facebook\Facebook
     */
    public function getFB()
    {
        if (isset($this->_fb)) {
            return $this->_fb;
        }

        $config = array();
        $config['app_id'] = Mage::getStoreConfig('facebook/app/app_id');
        $config['app_secret'] = Mage::getStoreConfig('facebook/app/app_secret');
        $config['default_graph_version'] = 'v2.10';

        $functions = spl_autoload_functions();
        Mage::helper('facebook')->unregisterAutoloader($functions);

        require_once(Mage::getBaseDir('lib') . '/Facebook/autoload.php');
        $this->_fb = new Facebook\Facebook($config);

        Mage::helper('facebook')->registerAutoloader($functions);
        return $this->_fb;
    }


    /**
     * @return bool|mixed
     */
    public function getUser()
    {
        if ($this->getUserData()) {
            return $this->getUserData()->getField('id');
        }
        return false;
    }

    /**
     * @return string
     */
    public function getLoginUrl()
    {
        $path = Mage::getUrl(self::FB_SERVICE_URL);
        $helper = $this->getFB()->getRedirectLoginHelper();
        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl($path, $permissions);

        return $loginUrl;
    }


    /**
     * @return bool|\Facebook\GraphNodes\GraphUser
     */
    public function getUserData()
    {
        if (isset($this->_userData)) {
            return $this->_userData;
        }

        try {

            if (!$this->getAccessToken()) {
                $this->_userData = false;
                return $this->_userData;
            }

            /** @var Facebook\FacebookResponse $response */
            $response = $this->getFB()->get('/me?fields=' . self::REQUIRED_FIELDS, $this->getAccessToken()->getValue());
        } catch (Exception $e) {
            Mage::logException($e);
            return false;
        }

        /** @var \Facebook\GraphNodes\GraphUser $userData */
        $userData = $response->getGraphUser();

        if (!isset($userData)) {
            return false;
        }
        $this->_userData = $userData;
        return $this->_userData;

    }

    /**
     * @return string
     */
    public function getSessionField()
    {
        return 'fb_' . Mage::getStoreConfig('facebook/app/app_id') . '_user_id';
    }


    /**
     * @return bool|\Facebook\Authentication\AccessToken|null
     */
    private function getAccessToken()
    {
        if (isset($this->_accessToken)) {
            return $this->_accessToken;
        }

        $helper = $this->getFB()->getRedirectLoginHelper();
        try {
            $accessToken = $helper->getAccessToken();
        } catch (Exception $e) {
            // When Graph returns an error
            Mage::logException($e);
            return false;
        }

        if (!isset($accessToken)) {
            return false;
        }
        $this->_accessToken = $accessToken;
        return $this->_accessToken;
    }

}