<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Logic\Conj;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class ConjunctionTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function conjunctionIsTrue(): void
    {
        $this->assertMixedCastThat(
            new Conj(new LogicOf(true), true),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function conjunctionIsFalse(): void
    {
        $this->assertMixedCastThat(
            new Conj(new LogicOf(false), false),
            new IsFalse()
        );
    }
}
