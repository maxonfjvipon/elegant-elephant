<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrKeys;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class ArrKeysTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    const EXPECTED = [1, 2, 3, 4];
    const GIVEN = [
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
        $this->assertScalarThat(
            ArrKeys(self::GIVEN)->value(),
            new IsEqual(self::EXPECTED)
        );
    }
}
