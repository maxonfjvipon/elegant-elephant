<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Filtered array.
 */
final class ArrFiltered extends ArrEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable $arr
     * @param callable $callback
     */
    final public function __construct($arr, callable $callback)
    {
        parent::__construct(
            new ArrFromCallback(
                fn () => array_filter((array) $this->mixedCast($arr), $callback, ARRAY_FILTER_USE_BOTH)
            )
        );
    }
}
