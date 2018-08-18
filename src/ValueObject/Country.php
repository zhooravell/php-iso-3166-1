<?php

namespace Iso\Countries\ValueObject;

use JsonSerializable;
use Iso\Countries\Exception\InvalidCountryNameException;
use Iso\Countries\Exception\InvalidCountryCodeException;

/**
 * Count value object. Contains code and country name.
 *
 * @see https://en.wikipedia.org/wiki/ISO_3166-1
 * @see https://en.wikipedia.org/wiki/Value_object
 * @see https://martinfowler.com/bliki/ValueObject.html
 */
class Country implements JsonSerializable
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $name;

    /**
     * @param string $code
     * @param string $name
     *
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function __construct($code, $name)
    {
        $code = trim($code);
        $name = trim($name);

        if (empty($code)) {
            throw InvalidCountryCodeException::emptyCountryCode();
        }

        if (empty($name)) {
            throw InvalidCountryNameException::emptyCountryName();
        }

        $this->code = $code;
        $this->name = $name;
    }

    /**
     * @param Country $country
     *
     * @return bool
     */
    public function equal(Country $country)
    {
        return $this->getCode() === $country->getCode() && $this->getName() === $country->getName();
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
        ];
    }

    public function __toString()
    {
        return sprintf('%s %s', $this->code, $this->name);
    }
}
