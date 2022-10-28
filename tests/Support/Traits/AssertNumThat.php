<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Support\Traits;

use Exception;
use Maxonfjvipon\ElegantElephant\Num;
use PHPUnit\Framework\Constraint\Constraint;

trait AssertNumThat
{
    /**
     * @param Num $num
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    protected function assertNumThat(Num $num, Constraint $constraint, string $message = ''): void
    {
        $this->assertThat($num->asNumber(), $constraint, $message);
    }
}