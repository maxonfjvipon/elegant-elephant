<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Array combined of keys and values.
 */
final class ArrCombined extends ArrWrap
{
    use EnsureArr;

    /**
     * Ctor.
     *
     * @param array<string|int|float|Txt|Num>|Arr $keys
     * @param array<mixed>|Arr                    $values
     */
    final public function __construct($keys, $values)
    {
        parent::__construct(
            ArrOf::func(
                function () use ($keys, $values) {
                    $keys = $this->ensuredArr($keys)->asArray();
                    $values = $this->ensuredArr($values)->asArray();

                    if (count($keys) !== count($values)) {
                        throw new Exception("Keys and values arrays must have the same length");
                    }

                    return (array) array_combine($keys, $values);
                }
            )
        );
    }
}
