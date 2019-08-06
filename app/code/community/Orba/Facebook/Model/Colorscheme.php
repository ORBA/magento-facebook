<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */

/**
 * Class Orba_Facebook_Model_Colorscheme
 */
class Orba_Facebook_Model_Colorscheme extends Mage_Core_Model_Abstract {

    /**
     * light
     */
    const FACEBOOKCONNECT_COLORSCHEME_LIGHT = 'light';
    /**
     * dark
     */
    const FACEBOOKCONNECT_COLORSCHEME_DARK = 'dark';

    /**
     * @return array
     */
    public function toOptionArray() {
        return array(
            array(
                'value' => Orba_Facebook_Model_Colorscheme::FACEBOOKCONNECT_COLORSCHEME_LIGHT,
                'label' => Mage::helper('facebook')->__('Light')
            ),
            array(
                'value' => Orba_Facebook_Model_Colorscheme::FACEBOOKCONNECT_COLORSCHEME_DARK,
                'label' => Mage::helper('facebook')->__('Dark')
            )
        );
    }
    
}