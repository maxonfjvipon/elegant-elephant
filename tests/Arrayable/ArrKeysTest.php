<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrKeys;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrKeysTest extends TestCase
{
    public const EXPECTED = [1, 2, 3, 4];
    public const GIVEN = [
        1 => "value1",
        2 => "value2",
        3 => "value3",
        4 => "value4"
    ];

    /**
     * @test
     * @throws Exception
     */
    public function arrValuesWorks(): void
    {
        $this->assertMixedCastThat(
            new ArrKeys(self::GIVEN),
            new IsEqual(self::EXPECTED)
        );
    }
}
