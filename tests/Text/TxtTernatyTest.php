<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\True;
use Maxonfjvipon\Elegant_Elephant\Boolean\Untruth;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use Maxonfjvipon\Elegant_Elephant\Text\TxtTernary;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class TxtTernatyTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textTernaryWithPrimitives(): void
    {
        $this->assertScalarThat(
            TxtTernary(true, "foo", "bar")->value(),
            new IsEqual("foo")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textTernaryWithLogicalAndTexts(): void
    {
        $this->assertScalarThat(
            TxtTernary(new Untruth(), new TextOf("foo"), new TxtUpper(new TextOf("bar")))->value(),
            new IsEqual("BAR")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textTernaryWithCallbacks(): void
    {
        $this->assertScalarThat(
            TxtTernary(
                new True(),
                fn () => new TextOf("hey there!"),
                fn () => new TxtBlank()
            )->value(),
            new IsEqual("hey there!")
        );
    }
}
