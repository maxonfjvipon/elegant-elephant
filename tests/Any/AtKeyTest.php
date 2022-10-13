<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Any;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\AtKey;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class AtKeyTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function atKeyOfArray(): void
    {
        $this->assertScalarThat(
            (new AtKey([
                'key1' => 2,
                'key2' => "Hello world!",
                'key3' => new \stdClass(),
            ], 'key1'))->asAny(),
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
            (new AtKey(
                new ArrayableOf([
                    'key1' => 2,
                    'key2' => "Hello world!",
                    'key3' => new \stdClass(),
                ]),
                'key3'
            ))->asAny(),
            new IsEqual(new \stdClass())
        );
    }
}
