<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Support\Traits;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr;
use PHPUnit\Framework\Constraint\Constraint;

trait AssertArrThat
{
    /**
     * @param Arr $arr
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    protected function assertArrThat(Arr $arr, Constraint $constraint, string $message = ''): void
    {
        $this->assertThat($arr->asArray(), $constraint, $message);
    }
}