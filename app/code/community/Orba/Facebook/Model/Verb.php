<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */

/**
 * Class Orba_Facebook_Model_Verb
 */
class Orba_Facebook_Model_Verb extends Mage_Core_Model_Abstract {

    /**
     * like
     */
    const FACEBOOKCONNECT_VERB_LIKE = 'like';
    /**
     * recommend
     */
    const FACEBOOKCONNECT_VERB_RECOMMEND = 'recommend';

    /**
     * @return array
     */
    public function toOptionArray() {
        return array(
            array(
                'value' => Orba_Facebook_Model_Verb::FACEBOOKCONNECT_VERB_LIKE,
                'label' => Mage::helper('facebook')->__('Like')
            ),
            array(
                'value' => Orba_Facebook_Model_Verb::FACEBOOKCONNECT_VERB_RECOMMEND,
                'label' => Mage::helper('facebook')->__('Recommend')
            )
        );
    }
    
}