<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Scalar;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\AtKey;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class AtKeyTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function atKeyOfArray(): void
    {
        $this->assertScalarThat(
            new AtKey(
                'key1',
                [
                    'key1' => 2,
                    'key2' => "Hello world!",
                    'key3' => new \stdClass(),
                ]
            ),
            new IsEqual(2)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function atKeyOfArrayable(): void
    {
        $this->assertScalarThat(
            new AtKey(
                'key3',
                new ArrayableOf([
                    'key1' => 2,
                    'key2' => "Hello world!",
                    'key3' => new \stdClass(),
                ]),
            ),
            new IsEqual(new \stdClass())
        );
    }
}
