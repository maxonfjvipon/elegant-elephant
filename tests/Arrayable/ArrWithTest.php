<?php

namespace Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrWith;
use Maxonfjvipon\Elegant_Elephant\Number\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrWithTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function complexArrWith(): void
    {
        $this->assertMixedCastThat(
            new ArrWith(
                new ArrWith(
                    new ArrWith(
                        new ArrWith(
                            new ArrEmpty(),
                            2
                        ),
                        "key",
                        "value"
                    ),
                    new TextOf("hello world")
                ),
                new NumberOf(42)
            ),
            new IsEqual([
                0 => 2,
                "key" => "value",
                1 => "hello world",
                2 => 42
            ])
        );
    }
}
