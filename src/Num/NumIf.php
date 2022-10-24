<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

use Maxonfjvipon\ElegantElephant\Logic;
use Maxonfjvipon\ElegantElephant\Num;

/**
 * Numerable if.
 */
final class NumIf extends NumWrap
{
    /**
     * Ctor.
     *
     * @param bool|Logic    $condition
     * @param float|int|Num $num
     */
    final public function __construct($condition, $num)
    {
        parent::__construct(
            new NumCond(
                $condition,
                $num,
                0
            )
        );
    }
}
