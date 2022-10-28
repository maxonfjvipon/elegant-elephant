<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Any\EnsureAny;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Array combined of keys and values.
 */
final class ArrCombined extends ArrWrap
{
    use EnsureArr;
    use EnsureAny;

    /**
     * Ctor.
     *
     * @param array<string|int|float|Txt|Num|Any>|Arr $keys
     * @param array<mixed>|Arr                    $values
     */
    final public function __construct(array|Arr $keys, array|Arr $values)
    {
        parent::__construct(
            ArrOf::func(
                function () use ($keys, $values) {
                    $mapped = fn (array $toMap) => array_map(
                        fn (string|int|float|Txt|Num|Any $item) => $this->ensuredAnyValue($item),
                        $toMap
                    );

                    $keys = call_user_func($mapped, $this->ensuredArray($keys));
                    $values = call_user_func($mapped, $this->ensuredArray($values));

                    if (count($keys) !== count($values)) {
                        throw new Exception("Keys and values arrays must have the same length");
                    }

                    return (array) array_combine($keys, $values);
                }
            )
        );
    }
}