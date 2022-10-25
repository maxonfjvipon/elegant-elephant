<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Logic;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Any\AnyCond;

/**
 * Conditional number.
 */
final class NumCond extends NumWrap
{
    /**
     * Ctor.
     * @param bool|Logic    $condition
     * @param float|int|Num $first
     * @param float|int|Num $second
     */
    final public function __construct(bool|Logic $condition, float|int|Num $first, float|int|Num $second)
    {
        parent::__construct(
            NumOf::any(
                new AnyCond(
                    $condition,
                    AnyOf::num($first),
                    AnyOf::num($second),
                )
            )
        );
    }
}
