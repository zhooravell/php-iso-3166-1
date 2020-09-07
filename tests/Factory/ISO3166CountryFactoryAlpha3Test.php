<?php

namespace Iso\Countries\Tests\Factory;

use PHPUnit\Framework\TestCase;
use Iso\Countries\ValueObject\Country;
use Iso\Countries\Factory\ISO3166CountryFactory;
use Iso\Countries\Exception\InvalidCountryNameException;
use Iso\Countries\Exception\InvalidCountryCodeException;
use Iso\Countries\Factory\ISO3166CountryFactoryInterface;

/**
 * Class ISO3166CountryFactoryAlpha3Test.
 */
class ISO3166CountryFactoryAlpha3Test extends TestCase
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
        $canada = $this->factory->fromAlphaThreeCode('CAN');

        self::assertInstanceOf(Country::class, $canada);
        self::assertEquals(getThreeCharacterCountries()['CAN'], $canada->getName());
    }

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testSuccessLowerCase()
    {
        $cuba = $this->factory->fromAlphaThreeCode('can');

        self::assertInstanceOf(Country::class, $cuba);
        self::assertEquals(getThreeCharacterCountries()['CAN'], $cuba->getName());
    }

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testEmptyCode()
    {
        self::expectException(InvalidCountryCodeException::class);
        self::expectExceptionMessage('Country code should not be blank.');

        $this->factory->fromAlphaThreeCode(' ');
    }

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testInvalidCodeLength()
    {
        self::expectException(InvalidCountryCodeException::class);
        self::expectExceptionMessage('Alpha 3 code should have exactly 3 characters.');

        $this->factory->fromAlphaThreeCode('TEST');
    }

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testNonExistentCode()
    {
        self::expectException(InvalidCountryCodeException::class);
        self::expectExceptionMessage('Country with code "AAA" not found.');

        $this->factory->fromAlphaThreeCode('AAA');
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
