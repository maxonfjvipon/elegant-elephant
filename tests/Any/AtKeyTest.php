<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Any;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\AtKey;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
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
        $this->assertAnyThat(
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
    public function atKeyOfArr(): void
    {
        $this->assertAnyThat(
            new AtKey(
                'key3',
                ArrOf::array([
                    'key1' => 2,
                    'key2' => "Hello world!",
                    'key3' => new \stdClass(),
                ]),
            ),
            new IsEqual(new \stdClass())
        );
    }
}
