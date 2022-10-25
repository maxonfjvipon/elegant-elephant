<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Num\EnsureNum;

/**
 * Array range.
 */
final class ArrRange extends ArrWrap
{
    use EnsureNum;

    /**
     * Ctor.
     *
     * @param int|float|Num $from
     * @param int|float|Num $to
     * @param int|float|Num $step
     */
    final public function __construct(
        int|float|Num $from,
        int|float|Num $to,
        int|float|Num $step = 1
    ) {
        parent::__construct(
            ArrOf::func(
                fn () => range(
                    $this->ensuredNumber($from),
                    $this->ensuredNumber($to),
                    $this->ensuredNumber($step)
                )
            )
        );
    }
}
