<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Any;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * First item.
 */
final class FirstOf implements Any
{
    use EnsureAny;

    /**
     * @var array<mixed>|string|Arr|Txt|Any $container
     */
    private $container;

    /**
     * @param  string|Txt $text
     * @return FirstOf
     */
    final public static function text($text): FirstOf
    {
        return new FirstOf(AnyOf::text($text));
    }

    /**
     * First of array.
     *
     * @param  array<mixed>|Arr $arr
     * @return FirstOf
     */
    public static function arr($arr): FirstOf
    {
        return new FirstOf(AnyOf::arr($arr));
    }

    /**
     * Ctor.
     *
     * @param array<mixed>|string|Arr|Txt|Any $container
     */
    final public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    final public function value()
    {
        $value = $this->ensuredAny($this->container)->value();

        if (!is_string($value) && !is_array($value)) {
            throw new Exception("The element to get the first element from must be an array or string");
        }

        return $value[0];
    }
}
