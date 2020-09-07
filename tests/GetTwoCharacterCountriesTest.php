<?php

namespace Iso\Countries\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Class GetTwoCharacterCountriesTest.
 */
class GetTwoCharacterCountriesTest extends TestCase
{
    public function test()
    {
        self::assertTrue(function_exists('getTwoCharacterCountries'), 'Function "getTwoCharacterCountries" does not exist.');

        $countries = getTwoCharacterCountries();

        self::assertCount(ISO_3166_1_COUNTRIES_NUMBER, $countries, 'Currently 249 countries in ISO 3166-1');

        foreach ($countries as $code => $name) {
            self::assertSame(ISO_3166_1_ALPHA_2_CODE_LENGTH, mb_strlen($code), sprintf('Invalid code "%s". Country code should have exactly 2 characters', $code));
            self::assertNotEmpty($name, 'Country name should not be blank.');
        }
    }
}
