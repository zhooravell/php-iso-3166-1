<?php

namespace Iso\Countries\Exception;

/**
 * Class InvalidCountryNameException.
 */
class InvalidCountryNameException extends \Exception
{
    /**
     * @return InvalidCountryNameException
     */
    public static function emptyCountryName()
    {
        return new self('Country name should not be blank.');
    }
}
