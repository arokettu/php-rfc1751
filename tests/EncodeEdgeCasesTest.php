<?php

declare(strict_types=1);

namespace Arokettu\Rfc1751\Tests;

use Arokettu\Rfc1751\Rfc1751;
use PHPUnit\Framework\TestCase;

class EncodeEdgeCasesTest extends TestCase
{
    public function testEncodeEmpty(): void
    {
        self::assertEquals('', Rfc1751::encode(''));
    }

    public function testOffsetZeros(): void
    {
        $string1 = "1";
        $string2 = "1\0\0\0\0\0\0\0";
        self::assertEquals(Rfc1751::encode($string1), Rfc1751::encode($string2));
    }
}
