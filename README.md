# PHP ISO-3166-1 library
ISO 3166-1 php helper

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