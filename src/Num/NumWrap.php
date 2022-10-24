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
     * @var Num $origin
     */
    private Num $origin;

    /**
     * @param Num $origin
     */
    public function __construct(Num $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return float|int
     * @throws Exception
     */
    final public function asNumber()
    {
        return $this->origin->asNumber();
    }
}
