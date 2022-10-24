<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrFromCallback;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\Count;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrFromCallbackTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arrayFromCallback(): void
    {
        $this->assertMixedCastThat(
            new ArrFromCallback(fn () => [1, 2, 3]),
            new Count(3)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrayableFromCallback(): void
    {
        $this->assertMixedCastThat(
            new ArrFromCallback(fn () => new ArrOf([1, 2, 3, 4])),
            new Count(4)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrFromCallbackWithParams(): void
    {
        $this->assertMixedCastThat(
            new ArrFromCallback(fn ($num) => new ArrOf([1, 2, $num, 10]), 3),
            new IsEqual([1, 2, 3, 10])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function withError(): void
    {
        $this->expectExceptionMessage("Callback must return an array or Arrayable!");
        (new ArrFromCallback(fn () => "Hello world"))->asArray();
    }
}
