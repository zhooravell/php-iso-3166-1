<?php

if (!function_exists('getThreeCharacterCountries')) {
    /**
     * @return array
     */
    function getThreeCharacterCountries()
    {
        return include __DIR__.'/../resources/iso-3166-1-alpha-3.php';
    }
}

if (!function_exists('getTwoCharacterCountries')) {
    /**
     * @return array
     */
    function getTwoCharacterCountries()
    {
        return include __DIR__.'/../resources/iso-3166-1-alpha-2.php';
    }
}

if (!function_exists('getNumericCountryCodes')) {
    /**
     * @return array
     */
    function getNumericCountryCodes()
    {
        return include __DIR__.'/../resources/iso-3166-1-numeric.php';
    }
}
