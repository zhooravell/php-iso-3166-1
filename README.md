# PHP ISO-3166-1 library
> A PHP library providing ISO 3166-1 data.

## Example #1
```php
<?php
require 'vendor/autoload.php';

$canada1 = getTwoCharacterCountries()['CA'];
$canada2 = getThreeCharacterCountries()['CAN'];
$canada3 = getNumericCountryCodes()['124'];

var_dump($canada1, $canada2, $canada3);
```

## Example #2
```php
<?php
require 'vendor/autoload.php';

foreach (getTwoCharacterCountries() as $code => $name) {
    echo sprintf("%s %s\n", $code, $name);
}
```

## Example #3
```php
<?php
require 'vendor/autoload.php';

use Iso\Countries\Factory\ISO3166CountryFactory;

$factory = new ISO3166CountryFactory();

$canada = $factory->fromAlphaTwoCode('CA');

var_dump($canada);
```

## Source(s)

* [ISO 3166-1](http://en.wikipedia.org/wiki/ISO_3166-1) by [Wikipedia](http://www.wikipedia.org) licensed under [CC BY-SA 3.0 Unported License](http://en.wikipedia.org/wiki/Wikipedia:Text_of_Creative_Commons_Attribution-ShareAlike_3.0_Unported_License)
* [www.iso.org](http://www.iso.org)