# Fieldtize

Parse, validate and format common fields in an easy way.

- [Installation](#installation)
- [Methods](#methods)
- [Fields](#fields)
    - [Phone](#phone)
- [Testing](#testing)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)

## Installation

You can install the package via composer:

```bash
$ composer require vesperabr/fieldtize
```

## Methods

Every field class has at least this methods:

- `make()` Returns the field class instance.
- `original()` Returns the original value passed to the class.
- `get()` Returns the formatted value or null if value is invalid.
- `raw()` Returns the value without any masks or null if value is invalid.
- `isValid()` Returns true or false if value is invalid.

## Fields

### Phone

```php
use Vespera\Fieldtize\Fields\Phone;

$phone = Phone::make('1144443333');
$phone->original(); // '1144443333'
$phone->get();      // '(11) 4444-3333'
$phone->raw();      // '+551144443333'
$phone->isValid();  // true
echo $phone;        // '(11) 4444-3333'
```

## Todo

- [ ] Phone field: `getUri()` method
- [ ] Phone field: `getWhatsappUri()` method
- [ ] Phone field: `getInternationalNumber()` method
- [ ] Phone field: `getType()` method
- [ ] Phone field: `getCountry()` method
- [ ] CPF field
- [ ] CNPJ field
- [ ] CPF/CNPJ field
- [ ] CEP field
- [ ] E-mail field

## Testing

```bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Ricardo Monteiro](https://github.com/ricazao)
- [libphonenumber for PHP](https://github.com/giggsey/libphonenumber-for-php)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
