<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Any;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any\AtKey;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class AtKeyTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function atKeyOfArray(): void
    {
        Assert::assertThat(
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
        Assert::assertThat(
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
