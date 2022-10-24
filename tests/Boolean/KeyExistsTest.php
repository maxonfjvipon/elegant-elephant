<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Boolean;

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
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
            new KeyExists(new TxtOf("foo"), new ArrOf(['foo' => 1, 'bar'])),
            new IsTrue()
        );
    }
}
