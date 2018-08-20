<?php

namespace Iso\Countries\Tests\Factory;

use PHPUnit\Framework\TestCase;
use Iso\Countries\ValueObject\Country;
use Iso\Countries\Factory\ISO3166CountryFactory;
use Iso\Countries\Exception\InvalidCountryNameException;
use Iso\Countries\Exception\InvalidCountryCodeException;
use Iso\Countries\Factory\ISO3166CountryFactoryInterface;

/**
 * Class ISO3166CountryFactoryAlpha2Test.
 */
class ISO3166CountryFactoryAlpha2Test extends TestCase
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
        $canada = $this->factory->fromAlphaTwoCode('CA');

        self::assertInstanceOf(Country::class, $canada);
        self::assertEquals(getTwoCharacterCountries()['CA'], $canada->getName());
    }

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testSuccessLowerCase()
    {
        $cuba = $this->factory->fromAlphaTwoCode('cu');

        self::assertInstanceOf(Country::class, $cuba);
        self::assertEquals(getTwoCharacterCountries()['CU'], $cuba->getName());
    }

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testEmptyCode()
    {
        self::expectException(InvalidCountryCodeException::class);
        self::expectExceptionMessage('Country code should not be blank.');

        $this->factory->fromAlphaTwoCode(' ');
    }

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testInvalidCodeLength()
    {
        self::expectException(InvalidCountryCodeException::class);
        self::expectExceptionMessage('Alpha 2 code should have exactly 2 characters.');

        $this->factory->fromAlphaTwoCode('TEST');
    }

    /**
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function testNonExistentCode()
    {
        self::expectException(InvalidCountryCodeException::class);
        self::expectExceptionMessage('Country with code "AA" not found.');

        $this->factory->fromAlphaTwoCode('AA');
    }

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->factory = new ISO3166CountryFactory();
    }
}
