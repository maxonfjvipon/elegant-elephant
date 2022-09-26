<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrFromCallback;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\Count;
use PHPUnit\Framework\TestCase;

final class ArrFromCallbackTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arrayFromCallback(): void
    {
        Assert::assertThat(
            ArrFromCallback::new(fn () => [1, 2, 3]),
            new Count(3)
        );
    }

    /**
     * @test
     * @return void
     */
    public function arrayableFromCallback(): void
    {
        Assert::assertThat(
            ArrFromCallback::new(fn () => new ArrayableOf([1, 2, 3, 4])),
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
        $this->expectError();
        ArrFromCallback::new(fn () => "Hello world")->asArray();
    }
}
