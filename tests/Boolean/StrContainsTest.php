<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Boolean;

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
        $this->assertMixedCastThat(
            new InText("hello world", 'hello'),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function containsTextInText(): void
    {
        $this->assertMixedCastThat(
            new InText(new TxtOf("foo-bar"), new TxtOf("!!!")),
            new IsFalse()
        );
    }
}
