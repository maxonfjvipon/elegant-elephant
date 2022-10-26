<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Any;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\EnsureArr;
use Maxonfjvipon\ElegantElephant\Logic\EnsureLogic;
use Maxonfjvipon\ElegantElephant\Logic;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Num\EnsureNum;
use Maxonfjvipon\ElegantElephant\Txt\EnsureTxt;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Any of.
 */
final class AnyOf implements Any
{
    use EnsureLogic;
    use EnsureArr;
    use EnsureNum;
    use EnsureTxt;
    use EnsureAny;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * Any of number.
     *
     * @param  float|int|Num $num
     * @return AnyOf
     */
    final public static function num(float|int|Num $num): AnyOf
    {
        return new AnyOf(fn (AnyOf $self) => $self->ensuredNumber($num));
    }

    /**
     * Any of array.
     *
     * @param  array<mixed>|Arr $arr
     * @return AnyOf
     */
    final public static function arr(array|Arr $arr): AnyOf
    {
        return new AnyOf(fn (AnyOf $self) => $self->ensuredArray($arr));
    }

    /**
     * Any of text.
     *
     * @param  string|Txt $text
     * @return AnyOf
     */
    final public static function text(string|Txt $text): AnyOf
    {
        return new AnyOf(fn (AnyOf $self) => $self->ensuredString($text));
    }

    /**
     * Any of bool.
     *
     * @param  bool|Logic $bool
     * @return AnyOf
     */
    final public static function bool(bool|Logic $bool): AnyOf
    {
        return AnyOf::logic($bool);
    }

    /**
     * Any of logic.
     *
     * @param  bool|Logic $logic
     * @return AnyOf
     */
    final public static function logic(bool|Logic $logic): AnyOf
    {
        return new AnyOf(fn (AnyOf $self) => $self->ensuredBool($logic));
    }

    /**
     * Any of func.
     *
     * @param  callable $func
     * @param  mixed    ...$args
     * @return AnyOf
     */
    final public static function func(callable $func, mixed ...$args): AnyOf
    {
        return new AnyOf(fn (AnyOf $self) => $self->ensuredAnyValue(call_user_func($func, ...$args)));
    }

    /**
     * Ctor.
     *
     * @param callable $func
     */
    final public function __construct(callable $func)
    {
        $this->callback = $func;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    final public function value(): mixed
    {
        return call_user_func($this->callback, $this);
    }
}
