<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

use Maxonfjvipon\ElegantElephant\Num;

/**
 * Rounded number.
 */
final class Rounded extends NumWrap
{
    use EnsureNum;

    /**
     * Ctor.
     *
     * @param float|int|Num $num
     * @param int           $precision
     */
    final public function __construct($num, int $precision = 0)
    {
        parent::__construct(
            NumOf::func(fn () => round($this->ensuredNum($num)->asNumber()), $precision)
        );
    }
}
