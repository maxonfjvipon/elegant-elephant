<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Array sorted.
 */
final class ArrSorted extends ArrWrap
{
    use EnsureArr;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arr     $arr
     * @param callable|string|null $compare
     */
    final public function __construct(array|Arr $arr, callable|string|null $compare = null)
    {
        parent::__construct(
            ArrOf::func(
                function () use ($arr, $compare) {
                    $arr = $this->ensuredArray($arr);

                    if ($compare != null) {
                        usort(
                            $arr, is_string($compare)
                            ? fn ($a, $b) => $a[$compare] <=> $b[$compare]
                            : $compare
                        );
                    } else {
                        sort($arr);
                    }

                    return $arr;
                }
            )
        );
    }
}
