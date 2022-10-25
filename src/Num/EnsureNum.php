<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Num;

trait EnsureNum
{
    /**
     * @param float|int|Num $num
     * @return float|int
     * @throws Exception
     */
    private function ensuredNumber(float|int|Num $num): float|int
    {
        if ($num instanceof Num) {
            $num = $num->asNumber();
        }

        return $num;
    }
}
