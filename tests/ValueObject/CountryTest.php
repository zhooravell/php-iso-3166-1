<?php

namespace Iso\Countries\Tests\ValueObject;

use PHPUnit\Framework\TestCase;
use Iso\Countries\ValueObject\Country;
use Iso\Countries\Exception\InvalidCountryCodeException;
use Iso\Countries\Exception\InvalidCountryNameException;

/**
 * Class CountryTest.
 */
class CountryTest extends TestCase
{
    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testSuccess()
    {
        $code = '804';
        $name = 'Ukraine';
        $country = new Country($code, $name);

        self::assertSame($code, $country->getCode(), '');
        self::assertSame($name, $country->getName(), '');

        self::assertSame('804 Ukraine', (string) $country);
        self::assertSame('{"code":"804","name":"Ukraine"}', json_encode($country));
    }

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testEmptyCode()
    {
        self::expectException(InvalidCountryCodeException::class);
        self::expectExceptionMessage('Country code should not be blank.');

        new Country(' ', 'Ukraine');
    }

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testEmptyName()
    {
        self::expectException(InvalidCountryNameException::class);
        self::expectExceptionMessage('Country name should not be blank.');

        new Country('804', ' ');
    }

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testEqual()
    {
        $ukraine = new Country('804', 'Ukraine');
        $nepal = new Country('524', 'Nepal');

        self::assertTrue($ukraine->equal(clone $ukraine));
        self::assertFalse($ukraine->equal($nepal));
    }
}
