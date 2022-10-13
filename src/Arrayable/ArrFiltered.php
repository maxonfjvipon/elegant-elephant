<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;

/**
 * Filtered array.
 */
final class ArrFiltered extends ArrEnvelope
{
    use CastScalar;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable<mixed> $arr
     * @param callable $callback
     */
    public function __construct($arr, callable $callback)
    {
        parent::__construct(
            new ArrFromCallback(
                fn () => array_filter((array) $this->scalarCast($arr), $callback, ARRAY_FILTER_USE_BOTH)
            )
        );
    }
}
