<?php

namespace Maxonfjvipon\ElegantElephant\Tests;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Logic;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Txt;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * @param mixed $value
     * @param Constraint $constraint
     * @param string $message
     * @return void
     */
    private function assertValueThat(mixed $value, Constraint $constraint, string $message = ''): void
    {
        $this->assertThat($value, $constraint, $message);
    }

    /**
     * @param Any $any
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    protected function assertAnyThat(Any $any, Constraint $constraint, string $message = ''): void
    {
        $this->assertValueThat($any->value(), $constraint, $message);
    }

    /**
     * @param Txt $txt
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    protected function assertTxtThat(Txt $txt, Constraint $constraint, string $message = ''): void
    {
        $this->assertValueThat($txt->asString(), $constraint, $message);
    }

    /**
     * @param Arr $arr
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    protected function assertArrThat(Arr $arr, Constraint $constraint, string $message = ''): void
    {
        $this->assertValueThat($arr->asArray(), $constraint, $message);
    }

    /**
     * @param Num $num
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    protected function assertNumThat(Num $num, Constraint $constraint, string $message = ''): void
    {
        $this->assertValueThat($num->asNumber(), $constraint, $message);
    }

    /**
     * @param Logic $logic
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    protected function assertLogicThat(Logic $logic, Constraint $constraint, string $message = ''): void
    {
        $this->assertValueThat($logic->asBool(), $constraint, $message);
    }
}