<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Array wrap.
 */
abstract class ArrWrap implements IterableArr
{
    use HasArrIterator;

    /**
     * Ctor.
     * @param Arr $origin
     */
    public function __construct(private Arr $origin)
    {
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    final public function asArray(): array
    {
        return $this->origin->asArray();
    }
}
