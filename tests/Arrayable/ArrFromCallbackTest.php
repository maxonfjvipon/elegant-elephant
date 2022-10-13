<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrFromCallback;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\Count;

final class ArrFromCallbackTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arrayFromCallback(): void
    {
        $this->assertScalarThat(
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
        $this->assertScalarThat(
            new ArrFromCallback(fn () => new ArrayableOf([1, 2, 3, 4])),
            new Count(4)
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
        (new ArrFromCallback(fn () => "Hello world"))->value();
    }
}
