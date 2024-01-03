RFC 1751
########

|Packagist| |GitLab| |GitHub| |Bitbucket| |Gitea|

.. highlight:: php

`RFC 1751`_ encoder and decoder library for PHP.

.. _RFC 1751: https://datatracker.ietf.org/doc/html/rfc1751

Installation
============

.. code-block:: bash

   composer require arokettu/rfc1751

Documentation
=============

Encoding
--------

RFC 1751 algorithm encodes binary data by blocks of 8 bytes into 6 English words::

    <?php

    \Arokettu\Rfc1751\Rfc1751::encode(hex2bin('EB33F77EE73D4053'));
    // 'TIDE ITCH SLOW REIN RULE MOT'

Blocks shorter than 8 bytes will be padded by zeroes::

    <?php

    $encoded = \Arokettu\Rfc1751\Rfc1751::encode("\xeb");
    var_dump($encoded); // "TICK A A A A ACE"
    $decoded = \Arokettu\Rfc1751\Rfc1751::decode($encoded);
    var_dump(bin2hex($decoded)); // "eb00000000000000"

Decoding
--------

Decoding will succeed if

* Number of words is divisible by 6 to be able to decode entire blocks.
* 2-bit checksum (parity) is valid.

::

    <?php

    \Arokettu\Rfc1751\Rfc1751::decode('TIDE ITCH SLOW REIN RULE MOT');
    // 0xEB33F77EE73D4053

The string is case insensitive and space insensitive::

    <?php

    \Arokettu\Rfc1751\Rfc1751::decode('   tide ItcH    SLOW Rein   rule moT   ');
    // 0xEB33F77EE73D4053

License
=======

The library is available as open source under the terms of the `MIT License`_.

.. _MIT License: https://opensource.org/license/mit/

.. |Packagist|  image:: https://img.shields.io/packagist/v/arokettu/rfc1751.svg?style=flat-square
   :target:     https://packagist.org/packages/arokettu/rfc1751
.. |GitHub|     image:: https://img.shields.io/badge/get%20on-GitHub-informational.svg?style=flat-square&logo=github
   :target:     https://github.com/arokettu/php-rfc1751
.. |GitLab|     image:: https://img.shields.io/badge/get%20on-GitLab-informational.svg?style=flat-square&logo=gitlab
   :target:     https://gitlab.com/sandfox/php-rfc1751
.. |Bitbucket|  image:: https://img.shields.io/badge/get%20on-Bitbucket-informational.svg?style=flat-square&logo=bitbucket
   :target:     https://bitbucket.org/sandfox/php-rfc1751
.. |Gitea|      image:: https://img.shields.io/badge/get%20on-Gitea-informational.svg?style=flat-square&logo=gitea
   :target:     https://sandfox.org/sandfox/php-rfc1751
