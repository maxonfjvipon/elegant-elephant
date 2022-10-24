<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Logic;

/**
 * Represents {@see Arr} if {@code $condition} is TRUE
 * [] otherwise
 */
final class ArrIf extends ArrWrap
{
    /**
     * Ctor.
     *
     * @param bool|Logic $condition
     * @param array|Arr  $arr
     */
    final public function __construct($condition, $arr)
    {
        parent::__construct(
            new ArrCond(
                $condition,
                $arr,
                new ArrEmpty()
            )
        );
    }
}
