<?php

namespace Iso\Countries\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Class GetNumericCountryCodesTest.
 */
class GetNumericCountryCodesTest extends TestCase
{
    public function test()
    {
        self::assertTrue(function_exists('getNumericCountryCodes'), 'Function "getNumericCountryCodes" does not exist.');

        $countries = getNumericCountryCodes();

        self::assertCount(ISO_3166_1_COUNTRIES_NUMBER, $countries, 'Currently 249 countries in ISO 3166-1');

        foreach ($countries as $code => $name) {
            self::assertSame(ISO_3166_1_NUMERIC_CODE_LENGTH, mb_strlen($code), sprintf('Invalid code "%s". Country code should have exactly 3 characters', $code));
            self::assertNotEmpty($name, 'Country name should not be blank.');
            self::assertIsNumeric($code);
        }
    }
}
