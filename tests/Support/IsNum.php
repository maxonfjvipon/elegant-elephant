<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Support;

use Exception;
use Maxonfjvipon\ElegantElephant\Num;
use PHPUnit\Framework\Constraint\IsEqual;

final class IsNum extends ConstraintWrap
{
    /**
     * @param Num $num
     * @throws Exception
     */
    public function __construct(Num $num)
    {
        parent::__construct(
            new IsEqual($num->asNumber())
        );
    }
}