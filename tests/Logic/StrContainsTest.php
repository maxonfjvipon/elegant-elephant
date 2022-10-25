<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\InText;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class StrContainsTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function containsInString(): void
    {
        $this->assertLogicThat(
            new InText('hello', "hello world"),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function containsTextInText(): void
    {
        $this->assertLogicThat(
            new InText(TxtOf::str("foo-bar"), TxtOf::str("!!!")),
            new IsFalse()
        );
    }
}
