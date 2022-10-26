<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Array of.
 */
final class ArrOf implements IterableArr
{
    use HasArrIterator;
    use EnsureArr;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * @param  mixed ...$items
     * @return self
     */
    final public static function items(...$items): ArrOf
    {
        return new ArrOf(fn () => $items);
    }

    /**
     * Ctor.
     *
     * @param  array<mixed> $array
     * @return ArrOf
     */
    final public static function array(array $array): ArrOf
    {
        return new ArrOf(fn () => $array);
    }

    /**
     * Arr of Any.
     *
     * @param  Any $any
     * @return ArrOf
     */
    final public static function any(Any $any): ArrOf
    {
        return ArrOf::func(fn () => $any->value());
    }

    /**
     * Array of function.
     *
     * @param  callable $func
     * @param  mixed    ...$args
     * @return ArrOf
     */
    final public static function func(callable $func, mixed ...$args): ArrOf
    {
        return new ArrOf(fn (ArrOf $self) => $self->ensuredArray(call_user_func($func, ...$args)));
    }

    /**
     * Ctor.
     *
     * @param callable $func
     */
    final private function __construct(callable $func)
    {
        $this->callback = $func;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    final public function asArray(): array
    {
        return (array)call_user_func($this->callback, $this);
    }
}
