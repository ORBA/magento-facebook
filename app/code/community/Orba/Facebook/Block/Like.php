<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */

/**
 * Class Orba_Facebook_Block_Like
 */
class Orba_Facebook_Block_Like extends Mage_Core_Block_Template {

    /**
     * @var null
     */
    protected $type = null;

    /**
     * Constructor
     */
    protected function _construct() {
        parent::_construct();
    }

    /**
     * @return mixed
     */
    public function getOpts() {
        return Mage::helper('facebook')->getLikeButtonOpts($this->type);
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return Mage::helper('facebook')->getLikeButtonTitle($this->type);
    }

    /**
     * @param $type
     */
    public function setType($type) {
        $this->type = $type;
    }

    /**
     * @return null
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isVisible() {
        if (Mage::helper('facebook')->isActive()) {
            $parent = $this->getParentBlock()->_nameInLayout;
            return ($parent == Mage::helper('facebook')->getLikeButtonVisibility($this->type));
        } else {
            return false;
        }
    }

    /**
     * @return bool|string
     * @throws Varien_Exception
     */
    public function getDefaultUrl() {
        $request = Mage::app()->getRequest();
        if ($request->getModuleName() == 'catalog' && $request->getControllerName() == 'product' && $request->getActionName() == 'view') {
            $params = $request->getParams();
            $product = Mage::getModel('catalog/product')->load($params['id']);
            $url = $product->getProductUrl();
            return $url;
        }
        if ($request->getModuleName() == 'catalog' && $request->getControllerName() == 'category' && $request->getActionName() == 'view') {
            $params = $request->getParams();
            $category = Mage::getModel('catalog/category')->load($params['id']);
            $url = $category->getUrl();
            return $url;
        }
        if ($request->getModuleName() == 'cms' && $request->getControllerName() == 'index' && $request->getActionName() == 'index') {
            return $this->getBaseUrl(Mage_Core_Model_Store::URL_TYPE_LINK);
        }
        return false;
    }
    
}