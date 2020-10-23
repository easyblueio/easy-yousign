<center><img src="https://i.imgur.com/bo6FcQ7.png" alt="Easyblue" /></center>

# easyblue/easy-yousign
`easy-yousign` provide an easy way to use [YouSign API](https://dev.yousign.com/). Modern, tested and fully written in php.

Written here at [easyblue.io](https://www.easyblue.io/), a french insurtech company. Check out our website to see how we're using this package in production.


[![Latest Version][badge-release]][packagist]
[![Software License][badge-license]][license]
[![PHP Version][badge-php]][php]
![Coverage Status][badge-coverage]
[![Total Downloads][badge-downloads]][downloads]
[![github issues](https://img.shields.io/github/issues/easyblueio/easy-cache-react.svg?style=flat-square)](https://github.com/easyblueio/easy-yousign/issues)
[![github closed issues](https://img.shields.io/github/issues-closed/easyblueio/easy-cache-react.svg?style=flat-square&colorB=44cc11)](https://github.com/easyblueio/easy-yousign/issues?q=is%3Aissue+is%3Aclosed)

[badge-release]: https://img.shields.io/packagist/v/easyblue/easy-yousign.svg?style=flat-square&label=release
[badge-license]: https://img.shields.io/packagist/l/easyblue/easy-yousign.svg?style=flat-square
[badge-php]: https://img.shields.io/packagist/php-v/easyblue/easy-yousign.svg?style=flat-square
[badge-coverage]: https://img.shields.io/badge/Coverage-87.24%25-yellow.svg
[badge-downloads]: https://img.shields.io/packagist/dt/easyblue/easy-yousign.svg?style=flat-square&colorB=mediumvioletred

[packagist]: https://packagist.org/packages/easyblue/easy-yousign
[license]: https://github.com/easyblueio/easy-yousign/blob/master/LICENSE
[php]: https://php.net
[downloads]: https://packagist.org/packages/easyblue/easy-yousign

## Installation

Install this package as a dependency using [Composer](https://getcomposer.org).

``` bash
composer require easyblue/easy-yousign
```

## Usage
`Procedure` and `File` are supporting for basic mode but you can do a pull request to improve this library.

[Supported features](docs/features.md)

### Create procedure
``` php
use Easyblue\YouSign\Factory\Factory;
use Easyblue\YouSign\Model\File;
use Easyblue\YouSign\Model\FileObject;
use Easyblue\YouSign\Model\Member;
use Easyblue\YouSign\Model\Procedure;
use Easyblue\YouSign\Http\Client;

$ysApiKey = 'test';
$factory = new Factory($ysApiKey, Client::ENV_STAGING);

$member = (new Member())
    ->setFirstname('John')
    ->setLastname('Doe')
    ->setEmail('j.doe@domain.com')
    ->setPhone('+33611111111');

$file = (new File())
    ->setName('my_file.pdf')
    ->setContent('binary content');
    // or
    ->setContent('base64 content', false);
$file = $factory->file()->create();

$fileObject = (new FileObject())
    ->setFile($file)
    ->setPage(1)
    ->setPosition('230,499,464,589');
$member->addFileObject($fileObject);

$procedure = (new Procedure())->setName('My first procedure')
    ->setDescription('Awesome! Here is the description of my first procedure')
    ->addMember($member);
$procedure = $factory->procedure()->create($procedure);
```

### Get procedure
``` php
use Easyblue\YouSign\Factory\Factory;
use Easyblue\YouSign\Model\Procedure;
use Easyblue\YouSign\Http\Client;

$ysApiKey = 'test';
$factory = new Factory($ysApiKey, Client::ENV_STAGING);

/** Procedure $procedure **/
$procedure = $factory->procedure()->get('/procedures/9d1ede2b-5687-4440-bdc8-dd0bc64f668c');
```

### Download file
``` php
use Easyblue\YouSign\Factory\Factory;
use Easyblue\YouSign\Model\File;
use Easyblue\YouSign\Http\Client;

$ysApiKey = 'test';
$factory = new Factory($ysApiKey/*, Client::ENV_STAGING*/);

// Pdf content as binary file
$content = $factory->file()->download('/files/9d1ede2b-5687-4440-bdc8-dd0bc64f668c');

// Pdf content as base64
$content = $factory->file()->download('/files/9d1ede2b-5687-4440-bdc8-dd0bc64f668c', false);
```

## Contributing

Contributions are welcome! Before contributing to this project, familiarize
yourself with [CONTRIBUTING.md](CONTRIBUTING.md).

To develop this project, you will need [PHP](https://www.php.net) 7.4 or greater, [Composer](https://getcomposer.org) and make.

After cloning this repository locally, execute the following commands:

``` bash
cd /path/to/repository
composer install
```

Now, you are ready to develop!


#### Coding Standards

This project follows a superset of [PSR-12](https://www.php-fig.org/psr/psr-12/)
coding standards, enforced by [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer).
The project PHP_CodeSniffer configuration may be found in `phpcs.xml.dist`.

lint-staged will run PHP_CodeSniffer before committing. It will attempt to fix
any errors it can, and it will reject the commit if there are any un-fixable
issues. Many issues can be fixed automatically and will be done so pre-commit.

You may lint the entire codebase using PHP_CodeSniffer with the following
commands:

``` bash
make php-cs-fixer
```

#### Static Analysis

This project uses a combination of [PHPStan](https://github.com/phpstan/phpstan) to provide static analysis of PHP
code. Configurations for these are in `phpstan.neon.dist`,
respectively.

lint-staged will run PHPStan before committing. The pre-commit hook
does not attempt to fix any static analysis errors. Instead, the commit will
fail, and you must fix the errors manually.

You may run static analysis manually across the whole codebase with the
following command:

``` bash
# Static analysis
make phpspan
```

### Project Structure

This project uses [pds/skeleton](https://github.com/php-pds/skeleton) as its
base folder structure and layout.

| Name              | Description                                    |
| ------------------| ---------------------------------------------- |
| **bin/**          | Commands and scripts for this project          |
| **build/**        | Cache, logs, reports, etc. for project builds  |
| **docs/**         | Project-specific documentation                 |
| **resources/**    | Additional resources for this project          |
| **src/**          | Project library and application source code    |
| **tests/**        | Tests for this project                         |


## Copyright and License

The easyblue/easy-yousign library is copyright © easyblue
and licensed for use under the terms of the
MIT License (MIT). Please see [LICENSE](LICENSE) for more information.


