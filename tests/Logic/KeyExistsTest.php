<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Logic\KeyExists;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
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
        $this->assertLogicThat(
            new KeyExists("foo", ['foo' => 1, 'bar']),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textKeyExistsInArr(): void
    {
        $this->assertLogicThat(
            new KeyExists(TxtOf::str("foo"), ArrOf::array(['foo' => 1, 'bar'])),
            new IsTrue()
        );
    }
}
