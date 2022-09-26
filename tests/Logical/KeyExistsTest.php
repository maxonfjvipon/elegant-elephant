<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Logical\KeyExists;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

final class KeyExistsTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function keyExistsInArray(): void
    {
        Assert::assertThat(
            KeyExists::new("foo", ['foo' => 1, 'bar'])->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textKeyExistsInArrayable(): void
    {
        Assert::assertThat(
            KeyExists::new(new TextOf("foo"), new ArrayableOf(['foo' => 1, 'bar']))->asBool(),
            new IsTrue()
        );
    }
}
