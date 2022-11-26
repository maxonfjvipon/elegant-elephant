<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\IsNotNull;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class IsNotNullTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function isNotNull(): void
    {
        $this->assertLogicThat(
            new IsNotNull(
                [1, 2, 3]
            ),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function nullIsNull(): void
    {
        $this->assertLogicThat(
            new IsNotNull(null),
            new IsFalse()
        );
    }
}
