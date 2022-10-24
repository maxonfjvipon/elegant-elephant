<?php

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
    final public static function num($num): AnyOf
    {
        return new AnyOf(fn (AnyOf $self) => $self->ensuredNum($num)->asNumber());
    }

    /**
     * Any of array.
     *
     * @param  array|Arr $arr
     * @return AnyOf
     */
    final public static function arr($arr): AnyOf
    {
        return new AnyOf(fn (AnyOf $self) => $self->ensuredArr($arr)->asArray());
    }

    /**
     * Any of text.
     *
     * @param  string|Txt $str
     * @return AnyOf
     */
    final public static function text($str): AnyOf
    {
        return new AnyOf(fn (AnyOf $self) => $self->ensuredTxt($str)->asString());
    }

    /**
     * Any of bool.
     *
     * @param  bool|Logic $bool
     * @return AnyOf
     */
    final public static function bool($bool): AnyOf
    {
        return AnyOf::logic($bool);
    }

    /**
     * Any of logic.
     *
     * @param  bool|Logic $logic
     * @return AnyOf
     */
    final public static function logic($logic): AnyOf
    {
        return new AnyOf(fn (AnyOf $self) => $self->ensuredLogic($logic)->asBool());
    }

    /**
     * Any of func.
     *
     * @param  callable $func
     * @param  mixed    ...$args
     * @return AnyOf
     */
    final public static function func(callable $func, ...$args): AnyOf
    {
        return new AnyOf(fn () => call_user_func($func, ...$args));
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
     * @return mixed
     * @throws Exception
     */
    final public function value()
    {
        return call_user_func($this->callback, $this);
    }
}
