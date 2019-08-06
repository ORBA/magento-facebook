<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */

/**
 * Class Orba_Facebook_Model_Layoutplace
 */
class Orba_Facebook_Model_Layoutplace extends Mage_Core_Model_Abstract {

    /**
     * nowhere
     */
    const FACEBOOKCONNECT_LAYOUTPLACE_NOWHERE = 'nowhere';
    /**
     * left
     */
    const FACEBOOKCONNECT_LAYOUTPLACE_LEFT = 'left';
    /**
     * content
     */
    const FACEBOOKCONNECT_LAYOUTPLACE_CONTENT = 'content';
    /**
     * right
     */
    const FACEBOOKCONNECT_LAYOUTPLACE_RIGHT = 'right';

    /**
     * @return array
     */
    public function toOptionArray() {
        return array(
            array(
                'value' => Orba_Facebook_Model_Layoutplace::FACEBOOKCONNECT_LAYOUTPLACE_NOWHERE,
                'label' => Mage::helper('facebook')->__('Nowhere')
            ),
            array(
                'value' => Orba_Facebook_Model_Layoutplace::FACEBOOKCONNECT_LAYOUTPLACE_LEFT,
                'label' => Mage::helper('facebook')->__('Left Column')
            ),
            array(
                'value' => Orba_Facebook_Model_Layoutplace::FACEBOOKCONNECT_LAYOUTPLACE_CONTENT,
                'label' => Mage::helper('facebook')->__('Content')
            ),
            array(
                'value' => Orba_Facebook_Model_Layoutplace::FACEBOOKCONNECT_LAYOUTPLACE_RIGHT,
                'label' => Mage::helper('facebook')->__('Right Column')
            )
        );
    }
    
}