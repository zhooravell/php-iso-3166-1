<?php

namespace Iso\Countries\Factory;

use Iso\Countries\ValueObject\Country;
use Iso\Countries\Exception\InvalidCountryNameException;
use Iso\Countries\Exception\InvalidCountryCodeException;

/**
 * Interface ISO3166CountryFactoryInterface.
 */
interface ISO3166CountryFactoryInterface
{
    /**
     * @param string $code
     *
     * @return Country
     *
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function fromAlphaTwoCode($code);

    /**
     * @param string $code
     *
     * @return Country
     *
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function fromAlphaThreeCode($code);

    /**
     * @param string $code
     *
     * @return Country
     *
     * @throws InvalidCountryCodeException
     * @throws InvalidCountryNameException
     */
    public function fromNumericCode($code);
}
