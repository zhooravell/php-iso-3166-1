<?php

namespace Iso\Countries\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Class GetThreeCharacterCountriesTest.
 */
class GetThreeCharacterCountriesTest extends TestCase
{
    public function test()
    {
        self::assertTrue(function_exists('getThreeCharacterCountries'), 'Function "getThreeCharacterCountries" does not exist.');

        $countries = getThreeCharacterCountries();

        self::assertCount(ISO_3166_1_COUNTRIES_NUMBER, $countries, 'Currently 249 countries in ISO 3166-1');

        foreach ($countries as $code => $name) {
            self::assertSame(3, mb_strlen($code), sprintf('Invalid code "%s". Country code should have exactly 3 characters', $code));
            self::assertNotEmpty($name, 'Country name should not be blank.');
        }
    }
}
