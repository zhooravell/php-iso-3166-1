<?php

namespace Iso\Countries\Factory;

use Iso\Countries\ValueObject\Country;
use Iso\Countries\Exception\InvalidCountryCodeException;

/**
 * Class ISO3166CountryFactory.
 */
class ISO3166CountryFactory implements ISO3166CountryFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function fromAlphaTwoCode($code)
    {
        $code = trim($code);

        if (empty($code)) {
            throw InvalidCountryCodeException::emptyCountryCode();
        }

        if (ISO_3166_1_ALPHA_2_CODE_LENGTH != mb_strlen($code)) {
            throw InvalidCountryCodeException::invalidAlpha2CodeLength();
        }

        $code = strtoupper($code);
        $countries = getTwoCharacterCountries();

        if (!array_key_exists($code, $countries)) {
            throw InvalidCountryCodeException::nonExistentCode($code);
        }

        $country = $countries[$code];

        return new Country($code, $country);
    }

    /**
     * {@inheritdoc}
     */
    public function fromAlphaThreeCode($code)
    {
        $code = trim($code);

        if (empty($code)) {
            throw InvalidCountryCodeException::emptyCountryCode();
        }

        if (ISO_3166_1_ALPHA_3_CODE_LENGTH != mb_strlen($code)) {
            throw InvalidCountryCodeException::invalidAlpha3CodeLength();
        }

        $code = strtoupper($code);
        $countries = getThreeCharacterCountries();

        if (!array_key_exists($code, $countries)) {
            throw InvalidCountryCodeException::nonExistentCode($code);
        }

        $country = $countries[$code];

        return new Country($code, $country);
    }

    /**
     * {@inheritdoc}
     */
    public function fromNumericCode($code)
    {
        $code = trim($code);

        if (empty($code)) {
            throw InvalidCountryCodeException::emptyCountryCode();
        }

        if (ISO_3166_1_NUMERIC_CODE_LENGTH != mb_strlen($code)) {
            throw InvalidCountryCodeException::invalidNumericCodeLength();
        }

        $code = strtoupper($code);
        $countries = getNumericCountryCodes();

        if (!array_key_exists($code, $countries)) {
            throw InvalidCountryCodeException::nonExistentCode($code);
        }

        $country = $countries[$code];

        return new Country($code, $country);
    }
}
