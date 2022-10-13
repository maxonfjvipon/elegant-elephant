<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

use Maxonfjvipon\Elegant_Elephant\Text\TxtImploded;

final class TxtImplodedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function implodedOfStrings(): void
    {
        $this->assertScalarThat(
            new TxtImploded("-", "foo", "bar"),
            new IsEqual("foo-bar")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function implodedOfTexts(): void
    {
        $this->assertScalarThat(
            new TxtImploded(new TextOf("/"), new TxtUpper("foo"), "bar"),
            new IsEqual("FOO/bar")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function implodedWithComma(): void
    {
        $this->assertScalarThat(
            TxtImploded::withComma(new TxtUpper("foo"), "bar"),
            new IsEqual("FOO,bar")
        );
    }
}
