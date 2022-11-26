<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\IsNull;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class IsNullTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function nullIsNull(): void
    {
        $this->assertLogicThat(
            new IsNull(null),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function isNotNull(): void
    {
        $this->assertLogicThat(
            new IsNull(2),
            new IsFalse()
        );
    }
}
