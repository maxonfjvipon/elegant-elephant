<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Array sorted by keys.
 */
final class ArrSortedByKeys extends ArrEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable<mixed> $arr
     * @param callable|string|null $compare
     */
    public function __construct($arr, $compare = null)
    {
        parent::__construct(
            new ArrFromCallback(
                function () use ($arr, $compare) {
                    $arr = (array) $this->mixedCast($arr);

                    if (!!$compare && !is_callable($compare)) {
                        throw new Exception("Compare must be callable!");
                    }

                    $compare = !!$compare
                        ? (is_string($compare)
                            ? fn ($a, $b) => $a[$compare] <=> $b[$compare]
                            : $compare)
                        : fn ($a, $b) => $a <=> $b;

                    uksort($arr, $compare);

                    return $arr;
                }
            )
        );
    }
}
