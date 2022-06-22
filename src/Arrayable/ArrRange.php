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
     * @param int|float|Numerable|Any $from
     * @param int|float|Numerable|Any $to
     * @param int|float|Numerable|Any $step
     */
    public function __construct(
        private int|float|Numerable|Any $from,
        private int|float|Numerable|Any $to,
        private int|float|Numerable|Any $step = 1
    )
    {
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
