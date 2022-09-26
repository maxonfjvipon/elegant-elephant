<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrValues;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;
use function Symfony\Component\String\s;

final class ArrValuesTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arrValuesWorks(): void
    {
        $expected = [1, 2, 3, 4];
        $arr = [
            "key1" => 1,
            "key2" => 2,
            "key3" => 3,
            "key4" => 4
        ];
        Assert::assertThat(
            ArrValues::new($arr)->asArray(),
            new IsEqual($expected)
        );
    }
}
