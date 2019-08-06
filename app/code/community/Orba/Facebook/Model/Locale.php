<?php
/**
 *
 * Copyright (c) 2018. Orba Sp. z o.o. (https://orba.pl)
 *
 */

/**
 * Class Orba_Facebook_Model_Locale
 */
class Orba_Facebook_Model_Locale extends Mage_Core_Model_Abstract {

    /**
     * en_US
     */
    const ORBA_FACEBOOK_DEFAULT_LOCALE = 'en_US';

    /**
     * @return null|string
     * @throws Mage_Core_Model_Store_Exception
     */
    public function getCode() {
        $locales = $this->getCodes();
        $app_locale = Mage::app()->getStore()->getConfig('general/locale/code');
        if (in_array($app_locale, $locales)) {
            return $app_locale;
        } else {
            return ORBA_FACEBOOK_DEFAULT_LOCALE;
        }
    }

    /**
     * @return array
     */
    private function getCodes() {
        return array(
            'af_ZA',
            'ar_AR',
            'az_AZ',
            'be_BY',
            'bg_BG',
            'bn_IN',
            'bs_BA',
            'ca_ES',
            'cs_CZ',
            'cy_GB',
            'da_DK',
            'de_DE',
            'el_GR',
            'en_GB',
            'en_PI',
            'en_UD',
            'en_US',
            'eo_EO',
            'es_ES',
            'es_LA',
            'et_EE',
            'eu_ES',
            'fa_IR',
            'fb_LT',
            'fi_FI',
            'fo_FO',
            'fr_CA',
            'fr_FR',
            'fy_NL',
            'ga_IE',
            'gl_ES',
            'he_IL',
            'hi_IN',
            'hr_HR',
            'hu_HU',
            'hy_AM',
            'id_ID',
            'is_IS',
            'it_IT',
            'ja_JP',
            'ka_GE',
            'ko_KR',
            'ku_TR',
            'la_VA',
            'lt_LT',
            'lv_LV',
            'mk_MK',
            'ml_IN',
            'ms_MY',
            'nb_NO',
            'ne_NP',
            'nl_NL',
            'nn_NO',
            'pa_IN',
            'pl_PL',
            'ps_AF',
            'pt_BR',
            'pt_PT',
            'ro_RO',
            'ru_RU',
            'sk_SK',
            'sl_SI',
            'sq_AL',
            'sr_RS',
            'sv_SE',
            'sw_KE',
            'ta_IN',
            'te_IN',
            'th_TH',
            'tl_PH',
            'tr_TR',
            'uk_UA',
            'vi_VN',
            'zh_CN',
            'zh_HK',
            'zh_TW'
        );
    }
    
}