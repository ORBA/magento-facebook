<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */

/**
 * Class Orba_Facebook_Model_Customer
 */
class Orba_Facebook_Model_Customer extends Mage_Core_Model_Abstract {

    /**
     *
     */
    public function _construct() {
        $this->_init('facebook/customer');
    }

    /**
     * @param $fb_user_id
     * @return mixed
     */
    public function loadByFbUserId($fb_user_id) {
        $collection = Mage::getResourceModel('customer/customer_collection')
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('fb_user_id', $fb_user_id)
            ->setPage(1, 1);
        $customer = current($collection->load()->getIterator());
        return $customer;
    }


    
}