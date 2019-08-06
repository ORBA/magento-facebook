<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */

/**
 * Class Orba_Facebook_Model_Type
 */
class Orba_Facebook_Model_Type extends Mage_Core_Model_Abstract {

    /**
     * login
     */
    const FACEBOOKCONNECT_TYPE_LOGIN = 'login';
    /**
     * connect
     */
    const FACEBOOKCONNECT_TYPE_CONNECT = 'connect';

    /**
     * @return array
     */
    public function toOptionArray() {
        return array(
            array(
                'value' => Orba_Facebook_Model_Type::FACEBOOKCONNECT_TYPE_LOGIN,
                'label' => 'Login'
            ),
            array(
                'value' => Orba_Facebook_Model_Type::FACEBOOKCONNECT_TYPE_CONNECT,
                'label' => 'Connect'
            )
        );
    }
    
}