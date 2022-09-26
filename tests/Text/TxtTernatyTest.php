<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\Truth;
use Maxonfjvipon\Elegant_Elephant\Logical\Untruth;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use Maxonfjvipon\Elegant_Elephant\Text\TxtTernary;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TxtTernatyTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textTernaryWithPrimitives(): void
    {
        Assert::assertThat(
            TxtTernary::new(true, "foo", "bar")->asString(),
            new IsEqual("foo")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textTernaryWithLogicalAndTexts(): void
    {
        Assert::assertThat(
            TxtTernary::new(new Untruth(), new TextOf("foo"), new TxtUpper(new TextOf("bar")))->asString(),
            new IsEqual("BAR")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textTernaryWithCallbacks(): void
    {
        Assert::assertThat(
            TxtTernary::new(
                new Truth(),
                fn () => new TextOf("hey there!"),
                fn () => new TxtBlank()
            )->asString(),
            new IsEqual("hey there!")
        );
    }
}
