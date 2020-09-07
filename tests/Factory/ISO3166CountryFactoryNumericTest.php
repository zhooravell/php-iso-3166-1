<?php

namespace Iso\Countries\Tests\Factory;

use PHPUnit\Framework\TestCase;
use Iso\Countries\ValueObject\Country;
use Iso\Countries\Factory\ISO3166CountryFactory;
use Iso\Countries\Exception\InvalidCountryNameException;
use Iso\Countries\Exception\InvalidCountryCodeException;
use Iso\Countries\Factory\ISO3166CountryFactoryInterface;

/**
 * Class ISO3166CountryFactoryNumericTest.
 */
class ISO3166CountryFactoryNumericTest extends TestCase
{
    /**
     * @var ISO3166CountryFactoryInterface
     */
    private $factory;

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testSuccessUpperCase()
    {
        $canada = $this->factory->fromNumericCode('124');

        self::assertInstanceOf(Country::class, $canada);
        self::assertEquals(getNumericCountryCodes()['124'], $canada->getName());
    }

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testEmptyCode()
    {
        self::expectException(InvalidCountryCodeException::class);
        self::expectExceptionMessage('Country code should not be blank.');

        $this->factory->fromNumericCode(' ');
    }

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testInvalidCodeLength()
    {
        self::expectException(InvalidCountryCodeException::class);
        self::expectExceptionMessage('Numeric code should have exactly 3 characters.');

        $this->factory->fromNumericCode('TEST');
    }

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testNonExistentCode()
    {
        self::expectException(InvalidCountryCodeException::class);
        self::expectExceptionMessage('Country with code "999" not found.');

        $this->factory->fromNumericCode('999');
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->factory = new ISO3166CountryFactory();
    }
}
