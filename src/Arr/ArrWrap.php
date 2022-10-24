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
     * @var Arr $origin
     */
    private Arr $origin;

    /**
     * Ctor.
     *
     * @param Arr $origin
     */
    public function __construct(Arr $origin)
    {
        $this->origin = $origin;
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
