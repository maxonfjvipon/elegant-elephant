<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Proc;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Func\FuncOf;
use Maxonfjvipon\Elegant_Elephant\Proc\ProcOf;
use Maxonfjvipon\Elegant_Elephant\Proc\Cycle;
use PHPUnit\Framework\TestCase;

class CycleTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testExec(): void
    {
//        $sum = 0;
//        Cycle::new(
//            static function ($num) use (&$sum) {
//                $sum += $num;
//            }
//        )->exec([1, 2, 3, 4]);
//        $this->assertEquals(10, $sum);
//
//        $sum = 0;
//        Cycle::new(
//            Cycle::new(
//                static function ($num) use (&$sum) {
//                    $sum += $num;
//                }
//            )
//        )->exec([[2, 3], [4, 4]]);
//        $this->assertEquals(13, $sum);
//
//        $sum = 0;
//        Cycle::new(
//            FuncOf::new(
//                function ($num) use (&$sum) {
//                    $sum += $num;
//                })
//        )->exec([1, 2, 3]);
//        $this->assertEquals(6, $sum);
    }
}
