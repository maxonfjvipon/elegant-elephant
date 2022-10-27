<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Closure;
use Exception;
use Maxonfjvipon\ElegantElephant\Any\EnsureAny;
use Maxonfjvipon\ElegantElephant\Arr;
use ReflectionFunction;

/**
 * Mapped array.
 */
final class ArrMapped extends ArrWrap
{
    use EnsureArr;
    use EnsureAny;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arr $arr
     * @param callable $callback
     */
    final public function __construct(array|Arr $arr, callable $callback, bool $ensure = false)
    {
        parent::__construct(
            ArrOf::func(
                function () use ($arr, $callback, $ensure) {
                    $count = (new ReflectionFunction(Closure::fromCallable($callback)))->getNumberOfParameters();

                    if ($count < 1 || $count > 2) {
                        throw new Exception("Invalid amount of arguments");
                    }

                    $array = $this->ensuredArray($arr);

                    $arrays = ($isTwo = $count === 2) ? [array_keys($array), $array] : [$array];

                    return array_map($ensure
                        ? ($isTwo
                            ? fn($key, $value) => $this->ensuredAnyValue(call_user_func($callback, $key, $value))
                            : fn($value) => $this->ensuredAnyValue(call_user_func($callback, $value)))
                        : $callback,
                        ...$arrays
                    );
                }
            )
        );
    }
}
