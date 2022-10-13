<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrExploded;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class ArrExplodedTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    public const SEPARATOR = "-";
    public const STRING = "foo-bar";
    public const STRING_WITH_COMMA = "foo,bar,baz";
    public const EXPLODED = ["foo", "bar"];
    public const EXPLODED_BY_COMMA = ["foo", 'bar', 'baz'];

    /**
     * @test
     * @throws Exception
     */
    public function explodedWithStrings(): void
    {
        $this->assertScalarThat(
            ArrExploded(self::SEPARATOR, self::STRING)->value(),
            new IsEqual(self::EXPLODED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function explodedWithTexts(): void
    {
        $this->assertScalarThat(
            ArrExploded(new TextOf(self::SEPARATOR), new TextOf(self::STRING))->value(),
            new IsEqual(self::EXPLODED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function explodedByComma(): void
    {
        $this->assertScalarThat(
            ArrExploded::byComma(self::STRING_WITH_COMMA)->value(),
            new IsEqual(self::EXPLODED_BY_COMMA)
        );
    }
}
