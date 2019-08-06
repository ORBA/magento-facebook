<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */

/**
 * Class Orba_Facebook_Model_Font
 */
class Orba_Facebook_Model_Font extends Mage_Core_Model_Abstract {

    /**
     * arial
     */
    const FACEBOOKCONNECT_FONT_ARIAL = 'arial';
    /**
     * lucida grande
     */
    const FACEBOOKCONNECT_FONT_LUCIDAGRANDE = 'lucida grande';
    /**
     * segoe ui
     */
    const FACEBOOKCONNECT_FONT_SEGOEUI = 'segoe ui';
    /**
     * tahoma
     */
    const FACEBOOKCONNECT_FONT_TAHOMA = 'tahoma';
    /**
     * trebuchet ms
     */
    const FACEBOOKCONNECT_FONT_TREBUCHETMS = 'trebuchet ms';
    /**
     * verdana
     */
    const FACEBOOKCONNECT_FONT_VERDANA = 'verdana';

    /**
     * @return array
     */
    public function toOptionArray() {
        return array(
            array(
                'value' => Orba_Facebook_Model_Font::FACEBOOKCONNECT_FONT_ARIAL,
                'label' => 'Arial'
            ),
            array(
                'value' => Orba_Facebook_Model_Font::FACEBOOKCONNECT_FONT_LUCIDAGRANDE,
                'label' => 'Lucida Grande'
            ),
            array(
                'value' => Orba_Facebook_Model_Font::FACEBOOKCONNECT_FONT_SEGOEUI,
                'label' => 'Segoe UI'
            ),
            array(
                'value' => Orba_Facebook_Model_Font::FACEBOOKCONNECT_FONT_TAHOMA,
                'label' => 'Tahoma'
            ),
            array(
                'value' => Orba_Facebook_Model_Font::FACEBOOKCONNECT_FONT_TREBUCHETMS,
                'label' => 'Trebuchet MS'
            ),
            array(
                'value' => Orba_Facebook_Model_Font::FACEBOOKCONNECT_FONT_VERDANA,
                'label' => 'Verdana'
            )
        );
    }
    
}