# RFC 1751 Encoder/Decoder

[![Packagist]][Packagist Link]
[![PHP Version]][Packagist Link]
[![License]][License Link]
[![Gitlab CI]][Gitlab CI Link]
[![Codecov]][Codecov Link]

[Packagist]: https://img.shields.io/packagist/v/arokettu/rfc1751.svg?style=flat-square
[PHP Version]: https://img.shields.io/packagist/php-v/arokettu/rfc1751.svg?style=flat-square
[License]: https://img.shields.io/github/license/arokettu/php-rfc1751.svg?style=flat-square
[Gitlab CI]: https://img.shields.io/gitlab/pipeline/sandfox/php-rfc1751/master.svg?style=flat-square
[Codecov]: https://img.shields.io/codecov/c/gl/sandfox/php-rfc1751?style=flat-square

[Packagist Link]: https://packagist.org/packages/arokettu/rfc1751
[License Link]: LICENSE.md
[Gitlab CI Link]: https://gitlab.com/sandfox/php-rfc1751/-/pipelines
[Codecov Link]: https://codecov.io/gl/sandfox/php-rfc1751/

[RFC 1751] encoder and decoder library for PHP.

## Installation

```bash
composer require 'arokettu/rfc1751'
```

## Simple use

```php
<?php

\Arokettu\Rfc1751\Rfc1751::encode("\x01\x23\x45\x67\x89\xab\xcd\xef");
// = 'AIM HEW BLUM FED MITE WARM'
\Arokettu\Rfc1751\Rfc1751::decode('AIM HEW BLUM FED MITE WARM');
// = "\x01\x23\x45\x67\x89\xab\xcd\xef"
```

## Documentation

Read full documentation here: <https://sandfox.dev/php/rfc1751.html>

## Support

Please file issues on our main repo at GitLab: <https://gitlab.com/sandfox/php-rfc1751/-/issues>

Feel free to ask any questions in our room on Gitter: <https://gitter.im/arokettu/community>

## License

The library is available as open source under the terms of the [MIT License][License Link].

[RFC 1751]: https://datatracker.ietf.org/doc/html/rfc1751
