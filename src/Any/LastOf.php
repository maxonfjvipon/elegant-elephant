<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Any;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Last of.
 */
final class LastOf extends AnyWrap
{
    use EnsureAny;

    /**
     * Last of text.
     *
     * @param  string|Txt $text
     * @return LastOf
     */
    final public static function text(string|Txt $text): LastOf
    {
        return new LastOf(AnyOf::text($text));
    }

    /**
     * @param array<mixed>|Arr $arr
     * @return LastOf
     */
    final public static function arr(array|Arr $arr): LastOf
    {
        return new LastOf(AnyOf::arr($arr));
    }

    /**
     * Ctor.
     *
     * @param string|array<mixed>|Txt|Arr|Any $container
     */
    final public function __construct(string|array|Txt|Arr|Any $container)
    {
        parent::__construct(
            AnyOf::func(
                function () use ($container) {
                    $value = $this->ensuredAnyValue($container);

                    if ((! $isString = is_string($value)) && ! is_array($value)) {
                        throw new Exception("The element to get the last element from must be an array or string");
                    }

                    if (empty($value)) {
                        throw new Exception("Can't get the last element of an empty value");
                    }

                    return $isString ? substr($value, -1) : $value[count($value) - 1];
                }
            )
        );
    }
}
