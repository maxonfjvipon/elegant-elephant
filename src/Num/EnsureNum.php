<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

use Maxonfjvipon\ElegantElephant\Num;

trait EnsureNum
{
    /**
     * @param  float|int|Num $num
     * @return Num
     */
    final private function ensuredNum($num): Num
    {
        if (!$num instanceof Num) {
            $num = NumOf::number($num);
        }

        return $num;
    }
}
