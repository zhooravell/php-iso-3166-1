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
}
