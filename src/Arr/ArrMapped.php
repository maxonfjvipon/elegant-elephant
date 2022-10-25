<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Closure;
use Maxonfjvipon\ElegantElephant\Arr;
use ReflectionFunction;

/**
 * Mapped array.
 */
final class ArrMapped extends ArrWrap
{
    use EnsureArr;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arr $arr
     * @param callable $callback
     */
    final public function __construct(array|Arr $arr, callable $callback)
    {
        parent::__construct(
            ArrOf::func(
                function () use ($arr, $callback) {
                    $count = (new ReflectionFunction(Closure::fromCallable($callback)))->getNumberOfParameters();

                    /**
                     * @var array<mixed> $array
                     */
                    $array = $this->ensuredArray($arr);

                    /**
                     * @var array<array<mixed>> $arguments
                     */
                    $arguments = $count > 1 ? [array_keys($array), $array] : [$array];

                    return array_map($callback, ...$arguments);
                }
            )
        );
    }
}
