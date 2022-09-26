<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use GuzzleHttp\Promise\Is;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMapped;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class ArrMappedTest extends TestCase
{
    const GIVEN = [1, 2, 3, 4, 5];
    const EXPECTED = [1, 4, 9, 16, 25];

    /**
     * @test
     * @throws Exception
     */
    public function mappedNotCast(): void
    {
        Assert::assertThat(
            ArrMapped::new(
                self::GIVEN,
                fn ($value) => $value * $value
            )->asArray(),
            new IsEqual(self::EXPECTED)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function mappedCast(): void
    {
        Assert::assertThat(
            ArrMapped::new(
                self::GIVEN,
                fn ($num) => new TextOf($num . "L"),
                true
            )->asArray(),
            new IsEqual([
                "1L",
                "2L",
                "3L",
                "4L",
                "5L"
            ])
        );
    }
}
