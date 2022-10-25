<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Num;

/**
 * Number wrap.
 */
abstract class NumWrap implements Num
{
    /**
     * Ctor.
     * @param Num $origin
     */
    public function __construct(private Num $origin)
    {
    }

    /**
     * @return float|int
     * @throws Exception
     */
    final public function asNumber(): float|int
    {
        return $this->origin->asNumber();
    }
}
