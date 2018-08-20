<?php

namespace Iso\Countries\Exception;

/**
 * Class InvalidCountryCodeException.
 */
class InvalidCountryCodeException extends \Exception
{
    /**
     * @return InvalidCountryCodeException
     */
    public static function emptyCountryCode()
    {
        return new self('Country code should not be blank.');
    }

    /**
     * @param mixed $code
     *
     * @return InvalidCountryCodeException
     */
    public static function nonExistentCode($code)
    {
        return new self(sprintf('Country with code "%s" not found.', $code));
    }

    /**
     * @return InvalidCountryCodeException
     */
    public static function invalidAlpha2CodeLength()
    {
        return new self(sprintf('Alpha 2 code should have exactly %d characters.', ISO_3166_1_ALPHA_2_CODE_LENGTH));
    }

    /**
     * @return InvalidCountryCodeException
     */
    public static function invalidAlpha3CodeLength()
    {
        return new self(sprintf('Alpha 3 code should have exactly %d characters.', ISO_3166_1_ALPHA_3_CODE_LENGTH));
    }

    /**
     * @return InvalidCountryCodeException
     */
    public static function invalidNumericCodeLength()
    {
        return new self(sprintf('Numeric code should have exactly %d characters.', ISO_3166_1_NUMERIC_CODE_LENGTH));
    }
}
