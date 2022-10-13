<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class TxtUpperTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    const GIVEN = "foo";
    const UPPER = "FOO";

    /**
     * @test
     * @throws Exception
     */
    public function upperOfString(): void
    {
        $this->assertScalarThat(
            TxtUpper(self::GIVEN)->value(),
            new IsEqual(self::UPPER)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function upperOfText(): void
    {
        $this->assertScalarThat(
            TxtUpper(new TextOf(self::GIVEN))->value(),
            new IsEqual(self::UPPER)
        );
    }
}
