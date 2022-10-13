<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Boolean\KeyExists;
use Maxonfjvipon\Elegant_Elephant\Number\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Constraint\IsTrue;


use function PHPUnit\Framework\assertEquals;

final class KeyExistsTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function keyExistsInArray(): void
    {
        $this->assertScalarThat(
            new KeyExists("foo", ['foo' => 1, 'bar']),
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
            new KeyExists(new TextOf("foo"), new ArrayableOf(['foo' => 1, 'bar'])),
            new IsTrue()
        );
    }
}
