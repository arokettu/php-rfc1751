<?php

declare(strict_types=1);

namespace Arokettu\Rfc1751\Tests;

use Arokettu\Rfc1751\Rfc1751;
use PHPUnit\Framework\TestCase;

// test examples from the Rfc
class RfcTest extends TestCase
{
    public function testEncoding(): void
    {
        $cases = [
            'EB33 F77E E73D 4053' =>
                'TIDE ITCH SLOW REIN RULE MOT',
            'CCAC 2AED 5910 56BE 4F90 FD44 1C53 4766' =>
                'RASH BUSH MILK LOOK BAD BRIM AVID GAFF BAIT ROT POD LOVE',
            'EFF8 1F9B FBC6 5350 920C DD74 16DE 8009' =>
                'TROD MUTE TAIL WARM CHAR KONG HAAG CITY BORE O TEAL AWL',
        ];

        foreach ($cases as $hex => $words) {
            $bin = hex2bin(str_replace(' ', '', $hex));

            self::assertEquals($words, Rfc1751::encode($bin));
        }
    }

    public function testDecoding(): void
    {
        $cases = [
            'EB33 F77E E73D 4053' =>
                'TIDE ITCH SLOW REIN RULE MOT',
            'CCAC 2AED 5910 56BE 4F90 FD44 1C53 4766' =>
                'RASH BUSH MILK LOOK BAD BRIM AVID GAFF BAIT ROT POD LOVE',
            'EFF8 1F9B FBC6 5350 920C DD74 16DE 8009' =>
                'TROD MUTE TAIL WARM CHAR KONG HAAG CITY BORE O TEAL AWL',
        ];

        foreach ($cases as $hex => $words) {
            $hexOutput = strtolower(str_replace(' ', '', $hex));

            self::assertEquals($hexOutput, bin2hex(Rfc1751::decode($words)));
        }
    }
}
