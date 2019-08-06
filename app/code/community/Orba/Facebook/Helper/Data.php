<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */

/**
 * Class Orba_Facebook_Helper_Data
 */
class Orba_Facebook_Helper_Data extends Mage_Core_Helper_Abstract
{

    /**
     * @return mixed
     */
    public function isActive()
    {
        return Mage::getStoreConfig('facebook/app/active');
    }

    /**
     * @return bool
     */
    public function isConnectActive()
    {
        return Mage::getStoreConfig('facebook/connect/active') && (bool)Mage::getStoreConfig('facebook/app/app_id');
    }

    /**
     * @return mixed
     */
    public function getAddConnectToTopLinks()
    {
        return Mage::getStoreConfig('facebook/connect/add_connect_to_top_links');
    }

    /**
     * @return bool
     * @throws Varien_Exception
     */
    public function isConnected()
    {
        return (bool)Mage::getSingleton('facebook/facebook')->getUser();
    }

    /**
     * @return mixed
     * @throws Varien_Exception
     */
    public function getLoginUrl()
    {
        return Mage::getSingleton('facebook/facebook')->getLoginUrl();
    }

    /**
     * @param $type
     * @return array
     */
    public function getLikeButtonOpts($type)
    {
        return array(
            'send' => Mage::getStoreConfig('facebook/likes_' . $type . '/send_button'),
            'layout' => Mage::getStoreConfig('facebook/likes_' . $type . '/layout_style'),
            'width' => Mage::getStoreConfig('facebook/likes_' . $type . '/width'),
            'show-faces' => Mage::getStoreConfig('facebook/likes_' . $type . '/show_faces'),
            'action' => Mage::getStoreConfig('facebook/likes_' . $type . '/verb_to_display'),
            'colorscheme' => Mage::getStoreConfig('facebook/likes_' . $type . '/color_scheme'),
            'font' => Mage::getStoreConfig('facebook/likes_' . $type . '/font'),
        );
    }

    /**
     * @param $type
     * @return mixed
     */
    public function getLikeButtonTitle($type)
    {
        return Mage::getStoreConfig('facebook/likes_' . $type . '/title');
    }

    /**
     * @param $type
     * @return mixed
     */
    public function getLikeButtonVisibility($type)
    {
        return Mage::getStoreConfig('facebook/likes_' . $type . '/active');
    }

    /**
     * @param null $title
     * @param bool $url_only
     * @return bool|mixed|string
     */
    public function connectLink($title = null, $url_only = false)
    {
        $output = '';
        if ($this->isActive() && $this->isConnectActive()) {
            if (!Mage::helper('customer')->isLoggedIn()) {
                if ($title === null) {
                    $title = 'Login with Facebook';
                }
            } else {
                return false;
            }
            if (!$url_only) {
                $output = '<a href="' . $this->getLoginUrl() . '" title="' . $this->__($title) . '">' . $this->__($title) . '</a>';
            } else {
                $output = $this->getLoginUrl();
            }
        }
        return $output;
    }

    /**
     * @param array $opts
     * @param bool $url
     * @return string
     */
    public function likeButton($opts = array(), $url = false)
    {
        $output = '';
        if ($this->isActive()) {
            $opts_def = array(
                'href' => Mage::helper('core/url')->getCurrentUrl(),
                'send' => false,
                'layout' => Orba_Facebook_Model_Layoutstyle::FACEBOOKCONNECT_LAYOUTSTYLE_STANDARD,
                'show-faces' => false,
                'action' => Orba_Facebook_Model_Verb::FACEBOOKCONNECT_VERB_LIKE,
                'colorscheme' => Orba_Facebook_Model_Colorscheme::FACEBOOKCONNECT_COLORSCHEME_LIGHT,
                'font' => Orba_Facebook_Model_Font::FACEBOOKCONNECT_FONT_ARIAL
            );
            if ($url) {
                $opts['href'] = $url;
            }
            $opts = array_merge($opts_def, $opts);
            $output = '<div class="fb-like"';
            foreach ($opts as $name => $value) {
                $output .= ' data-' . $name . '="' . $value . '"';
            }
            $output .= '></div>';
        }
        return $output;
    }

    /**
     * @return mixed
     * @throws Varien_Exception
     */
    public function getLocale()
    {
        return Mage::getModel('facebook/locale')->getCode();
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return Mage::getStoreConfig('facebook/app/app_id');
    }

    /**
     * @return bool|string
     */
    public function getRandomPassword()
    {
        return substr(md5(time() * rand(1, 100)), 0, 10);
    }


    public function unregisterAutoloader($functions)
    {
        foreach ($functions as $function) {
            spl_autoload_unregister($function);
        }
    }

    public function registerAutoloader($functions)
    {
        foreach ($functions as $function) {
            spl_autoload_register($function);
        }
    }


}