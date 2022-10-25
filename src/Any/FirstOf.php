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
    private array|string|Arr|Txt|Any $container;

    /**
     * @param string|Txt $text
     * @return FirstOf
     */
    final public static function text(Txt|string $text): FirstOf
    {
        return new FirstOf(AnyOf::text($text));
    }

    /**
     * First of array.
     *
     * @param Arr|array<mixed> $arr
     * @return FirstOf
     */
    public static function arr(array|Arr $arr): FirstOf
    {
        return new FirstOf(AnyOf::arr($arr));
    }

    /**
     * Ctor.
     *
     * @param string|Any|Arr|array<mixed>|Txt $container
     */
    final public function __construct(string|Any|Arr|array|Txt $container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    final public function value(): mixed
    {
        $value = $this->ensuredAnyValue($this->container);

        if (! is_string($value) && ! is_array($value)) {
            throw new Exception("The element to get the first element from must be an array or string");
        }

        if (empty($value)) {
            throw new Exception("Can't get the first element of an empty value");
        }

        return $value[0];
    }
}
