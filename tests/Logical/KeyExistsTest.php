<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Boolean\KeyExists;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsTrue;


use function PHPUnit\Framework\assertEquals;

final class KeyExistsTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function keyExistsInArray(): void
    {
        $this->assertScalarThat(
            KeyExists("foo", ['foo' => 1, 'bar'])->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textKeyExistsInArrayable(): void
    {
        $this->assertScalarThat(
            KeyExists(new TextOf("foo"), new ArrayableOf(['foo' => 1, 'bar']))->value(),
            new IsTrue()
        );
    }
}
