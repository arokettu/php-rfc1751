<?php

declare(strict_types=1);

namespace Arokettu\Rfc1751\Tests;

use Arokettu\Rfc1751\Rfc1751;
use PHPUnit\Framework\TestCase;

class DecodeEdgeCasesTest extends TestCase
{
    public function testDecodeEmpty(): void
    {
        self::assertEquals('', Rfc1751::decode(''));
    }

    public function testMustBe6Words(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Words count must be divisible by 6');

        Rfc1751::decode('RASH BUSH MILK LOOK BAD');
    }

    public function testKnownWords1(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Unrecognized word: XXXX');

        Rfc1751::decode('XXXX MUTE TAIL WARM CHAR KONG');
    }

    public function testKnownWords2(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Unrecognized word: XXXX');

        Rfc1751::decode('TROD XXXX TAIL WARM CHAR KONG');
    }

    public function testKnownWords3(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Unrecognized word: XXXX');

        Rfc1751::decode('TROD MUTE XXXX WARM CHAR KONG');
    }

    public function testKnownWords4(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Unrecognized word: XXXX');

        Rfc1751::decode('TROD MUTE TAIL XXXX CHAR KONG');
    }

    public function testKnownWords5(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Unrecognized word: XXXX');

        Rfc1751::decode('TROD MUTE TAIL WARM XXXX KONG');
    }

    public function testKnownWords6(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Unrecognized word: XXXX');

        Rfc1751::decode('TROD MUTE TAIL WARM CHAR XXXX');
    }

    public function testWrongParityBits(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Parity bits do not match');

        Rfc1751::decode('TROD MUTE TAIL WARM KING KONG');
    }

    public function testCaseSpaceInsensitive(): void
    {
        $decoded = Rfc1751::decode('    TROD  mUTe TaiL     WARM char Kong  ');

        self::assertEquals('eff81f9bfbc65350', bin2hex($decoded));
    }
}
