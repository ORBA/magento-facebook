<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */

/**
 * Class Orba_Facebook_Model_Layoutstyle
 */
class Orba_Facebook_Model_Layoutstyle extends Mage_Core_Model_Abstract {

    /**
     * standard
     */
    const FACEBOOKCONNECT_LAYOUTSTYLE_STANDARD = 'standard';
    /**
     * button_count
     */
    const FACEBOOKCONNECT_LAYOUTSTYLE_BUTTON = 'button_count';
    /**
     * box_count
     */
    const FACEBOOKCONNECT_LAYOUTSTYLE_BOX = 'box_count';

    /**
     * @return array
     */
    public function toOptionArray() {
        return array(
            array(
                'value' => Orba_Facebook_Model_Layoutstyle::FACEBOOKCONNECT_LAYOUTSTYLE_STANDARD,
                'label' => Mage::helper('facebook')->__('Standard')
            ),
            array(
                'value' => Orba_Facebook_Model_Layoutstyle::FACEBOOKCONNECT_LAYOUTSTYLE_BUTTON,
                'label' => Mage::helper('facebook')->__('Button Count')
            ),
            array(
                'value' => Orba_Facebook_Model_Layoutstyle::FACEBOOKCONNECT_LAYOUTSTYLE_BOX,
                'label' => Mage::helper('facebook')->__('Box Count')
            )
        );
    }
    
}