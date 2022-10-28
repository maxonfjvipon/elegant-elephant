<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic;
use Maxonfjvipon\ElegantElephant\Logic\LogicSticky;
use Maxonfjvipon\ElegantElephant\Tests\Support\IsLogic;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;

final class LogicStickyTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function logicStickyWorks(): void
    {
        $this->assertLogicThat(
            $logic = new LogicSticky(
                new class (2) implements Logic {
                    /**
                     * Ctor.
                     * @param int $num
                     */
                    public function __construct(private int $num)
                    {
                    }

                    /**
                     * @return bool
                     */
                    public function asBool(): bool
                    {
                        $this->num = $this->num + 2;
                        return $this->num === 4;
                    }
                }
            ),
            new IsLogic($logic)
        );
    }
}