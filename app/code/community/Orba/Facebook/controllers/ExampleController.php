<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */

class Orba_Facebook_ExampleController extends Mage_Core_Controller_Front_Action {


    public function indexAction() {
        if (Mage::helper('facebook')->isActive()) {
            $this->loadLayout();
            $this->renderLayout();
        } else {
            $this->_redirectUrl(Mage::helper('core/url')->getHomeUrl());
        }
    }
    
}