<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Tests\Any;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\AtKey;
use Maxonfjvipon\ElegantElephant\Any\AtValue;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrSticky;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class AtValueTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function primitiveTest(): void
    {
        $this->assertAnyThat(
            new AtValue("D", ["A", "B", "C", "D", "E"]),
            new IsEqual(3)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function complexTest(): void
    {
        $this->assertAnyThat(
            new AtValue(
                new AtKey(
                    $key = "A",
                    $arr = new ArrSticky(
                        ArrOf::array(["C" => 10, "D" => 20, "A" => 30, "E" => 40]),
                    )
                ),
                $arr
            ),
            new IsEqual($key)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function throwsExceptionWhenNotFound(): void
    {
        $this->expectExceptionMessage("Key by given value not found!");
        (new AtValue(1, [2, 3, 4, 5]))->value();
    }
}
