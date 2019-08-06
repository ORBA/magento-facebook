<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */


/**
 * Class Orba_Facebook_Block_Meta
 */
class Orba_Facebook_Block_Meta extends Mage_Core_Block_Template {

    /**
     * Constructor
     */
    protected function _construct() {
        parent::_construct();
        if (Mage::helper('facebook')->isActive()) {
            $this->setTemplate('facebook/meta.phtml');
        }
    }

    /**
     * @return bool|string
     * @throws Varien_Exception
     */
    public function getImage() {
        $request = Mage::app()->getRequest();
        if ($request->getModuleName() == 'catalog' && $request->getControllerName() == 'product' && $request->getActionName() == 'view') {
            $params = $request->getParams();
            $product = Mage::getModel('catalog/product')->load($params['id']);
            $url = $product->getImageUrl();
            if (!empty($url)) {
                return $url;
            }
        }
        if ($request->getModuleName() == 'catalog' && $request->getControllerName() == 'category' && $request->getActionName() == 'view') {
            $params = $request->getParams();
            $category = Mage::getModel('catalog/category')->load($params['id']);
            $url = $category->getImageUrl();
            if (!empty($url)) {
                return $url;
            }
        }
        $logo = $this->getSkinUrl(Mage::getStoreConfig('design/header/logo_src'));
        return (!empty($logo)) ? $logo : false;
    }

    /**
     * @return mixed
     */
    public function getAppId() {
        return Mage::getStoreConfig('facebook/app/app_id');
    }
    
}