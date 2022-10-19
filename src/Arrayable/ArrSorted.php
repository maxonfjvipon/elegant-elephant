<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Array sorted.
 */
final class ArrSorted extends ArrEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable $arr
     * @param callable|string|null $compare
     */
    final public function __construct($arr, $compare = null)
    {
        parent::__construct(
            new ArrFromCallback(
                function () use ($arr, $compare) {
                    $arr = (array) $this->mixedCast($arr);

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
