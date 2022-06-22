<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arr range.
 */
final class ArrRange implements Arrayable
{
    /**
     * Ctor.
     * @param int|float $from
     * @param int|float $to
     * @param int|float $step
     */
    public function __construct(
        private int|float $from,
        private int|float $to,
        private int|float $step = 1
    )
    {
    }

    /**
     * @return array
     */
    public function asArray(): array
    {
        return range($this->from, $this->to, $this->step);
    }
}
