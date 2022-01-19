<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Proc;

use Maxonfjvipon\Elegant_Elephant\Func\FuncOf;
use Maxonfjvipon\Elegant_Elephant\Proc\ProcOf;
use Maxonfjvipon\Elegant_Elephant\Proc\Through;
use PHPUnit\Framework\TestCase;

class ThroughTest extends TestCase
{
    public function testExec(): void
    {
        $sum = 0;
        Through::withCallable(
            static function ($num) use (&$sum) {
                $sum += $num;
            }
        )->exec([1, 2, 3, 4]);
        $this->assertEquals(10, $sum);

        $sum = 0;
        Through::withProc(
            Through::withCallable(
                static function ($num) use (&$sum) {
                    $sum += $num;
                }
            )
        )->exec([[2, 3], [4, 4]]);
        $this->assertEquals(13, $sum);

        $sum = 0;
        Through::withFunc(
            FuncOf::callable(function ($num) use (&$sum) {
                $sum += $num;
            })
        )->exec([1, 2, 3]);
        $this->assertEquals(6, $sum);
    }
}
