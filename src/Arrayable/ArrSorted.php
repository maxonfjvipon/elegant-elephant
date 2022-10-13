<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;

/**
 * Array sorted.
 */
final class ArrSorted extends ArrEnvelope
{
    use CastScalar;

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
                    $arr = (array) $this->scalarCast($arr);

                    if ($compare != null) {
                        usort($arr, is_string($compare)
                            ? fn ($a, $b) => $a[$compare] <=> $b[$compare]
                            : $compare);
                    } else {
                        sort($arr);
                    }

                    return $arr;
                }
            )
        );
    }
}
