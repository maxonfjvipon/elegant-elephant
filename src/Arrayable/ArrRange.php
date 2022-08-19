<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOverloaded;

/**
 * Arr range.
 */
final class ArrRange implements Arrayable
{
    use NumerableOverloaded;

    /**
     * Ctor.
     * @param int|float|Numerable $from
     * @param int|float|Numerable $to
     * @param int|float|Numerable $step
     */
    public function __construct(
        private int|float|Numerable $from,
        private int|float|Numerable $to,
        private int|float|Numerable $step = 1
    ) {
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        return range(...$this->numerableOverloaded($this->from, $this->to, $this->step));
    }
}
