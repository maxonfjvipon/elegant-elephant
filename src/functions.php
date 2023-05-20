<?php

/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2022 Max Trunnikov
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE
 */
declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant;

use Closure;
use Exception;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use ReflectionFunction;

// ENSURED
if (!function_exists('ensured_any')) {
    /**
     * Ensure any value.
     *
     * @param  mixed  $any  Value to be ensured
     * @return mixed Ensured value
     * @throws Exception If fails
     */
    function ensured_any(mixed $any): mixed
    {
        $getAny = function (mixed $any): Any {
            if ($any instanceof Any) {
                return $any;
            }

            if ($any instanceof Arr) {
                return AnyOf::arr($any);
            }

            if ($any instanceof Txt) {
                return AnyOf::text($any);
            }

            if ($any instanceof Num) {
                return AnyOf::num($any);
            }

            if ($any instanceof Logic) {
                return AnyOf::logic($any);
            }

            return AnyOf::just($any);
        };

        return $getAny($any)->value();
    }
}

if (!function_exists('ensured_array')) {
    /**
     * Ensured array.
     *
     * @param  array<mixed>|Arr  $arr
     * @return array<mixed>
     * @throws Exception
     */
    function ensured_array(array|Arr $arr): array
    {
        return is_array($arr) ? $arr : $arr->asArray();
    }
}

if (!function_exists('ensured_bool')) {
    function ensured_bool(bool|Logic $boolOrLogic): bool
    {
        return is_bool($boolOrLogic) ? $boolOrLogic : $boolOrLogic->asBool();
    }
}

if (!function_exists('ensured_string')) {
    /**
     * Ensured string.
     *
     * @param  string|Txt  $stringOrTxt  Text to be ensured
     * @return string Ensured string
     * @throws Exception If fails
     */
    function ensured_string(string|Txt $stringOrTxt): string
    {
        return is_string($stringOrTxt) ? $stringOrTxt : $stringOrTxt->asString();
    }
}

// ANY
if (!function_exists('any_cond')) {
    /**
     * Conditional Any.
     *
     * @param  bool|Logic  $condition  Condition
     * @param  mixed  $first  First value
     * @param  mixed  $second  Alternative value
     *
     * @see AnyCond
     */
    function any_cond(bool|Logic $condition, mixed $first, mixed $second): mixed
    {
        return any_fork($condition, $first, $second);
    }
}

if (!function_exists('any_fork')) {
    /**
     * Conditional Any.
     *
     * @param  bool|Logic  $condition  Condition
     * @param  mixed  $first  First value
     * @param  mixed  $second  Alternative value
     *
     * @see AnyFork
     */
    function any_fork(bool|Logic $condition, mixed $first, mixed $second): mixed
    {
        return ensured_bool($condition) ? ensured_any($first) : ensured_any($second);
    }
}

if (!function_exists('reduced')) {
    /**
     * @param  array<mixed>|Arr  $arr
     * @param  callable  $callback
     * @param  mixed  $init
     * @param  bool  $ensureInit
     * @return mixed
     * @throws Exception
     */
    function reduced(array|Arr $arr, callable $callback, mixed $init, bool $ensureInit = false): mixed
    {
        return ensured_any(
            array_reduce(
                array: ensured_array($arr),
                callback: $callback,
                initial: $ensureInit ? (ensured_any($init)) : $init
            )
        );
    }
}

if (!function_exists('at_key')) {
    /**
     * At key.
     *
     * @param  string|int|float|Num|Txt  $key  Key to get value by
     * @param  Arr|array<mixed>  $arr  Array to get value from
     *
     * @see AtKey
     */
    function at_key(string|int|float|Num|Txt $key, array|Arr $arr): mixed
    {
        return ensured_array($arr)[ensured_any($key)];
    }
}

if (!function_exists('at_value')) {
    /**
     * Key from array by element.
     *
     * @param  string|int|Txt|Num|Any  $value
     * @param  array<mixed>|Arr  $arr
     *
     * @see AtValue
     */
    function at_value(mixed $value, array|Arr $arr): string|int
    {
        $key = array_search(
            needle: ensured_any($value),
            haystack: ensured_array($arr),
            strict: true
        );

        if ($key === false) {
            throw new Exception("Key by given value not found!");
        }

        return $key;
    }
}

if (!function_exists('first_of')) {
    /**
     * First item.
     *
     * @param  string|Any|Arr|array<mixed>|Txt  $container  Container to get first element from
     *
     * @see FirstOf
     */
    function first_of(string|Any|Arr|array|Txt $container): mixed
    {
        $value = ensured_any($container);

        if (!is_string($value) && !is_array($value)) {
            throw new Exception("The element to get the first element from must be an array or string");
        }

        if (empty($value)) {
            throw new Exception("Can't get the first element of an empty value");
        }

        return $value[0];
    }
}

if (!function_exists('last_of')) {
    /**
     * Last of.
     *
     * @param  string|array<mixed>|Txt|Arr|Any  $container  Container to get last element from
     *
     * @see LastOf
     */
    function last_of(string|Any|Arr|array|Txt $container): mixed
    {
        $value = ensured_any($container);

        if (is_string($value)) {
            if (empty($value)) {
                throw new Exception(message: "Can't get the last element of an empty string");
            }

            $res = substr($value, -1);
        } elseif (is_array($value)) {
            if (empty($value)) {
                throw new Exception(message: "Can't get the last element of an empty array");
            }

            $res = $value[count($value) - 1];
        } else {
            throw new Exception(message: "The element to get the last element from must be an array or string");
        }

        return $res;
    }
}

// ARRAY
if (!function_exists('array_combined')) {
    /**
     * Ctor.
     *
     * @param  array<string|int|float|Txt|Num|Any>|Arr  $keys
     * @param  array<mixed>|Arr  $values
     * @param  bool  $ensure
     * @return array<string|int,mixed>
     *
     * @see ArrCombined
     */
    function array_combined(array|Arr $keys, array|Arr $values, bool $ensure = false): array
    {
        $callback = fn (mixed $any) => ensured_any($any);

        /** @var array<string|int> $keys */
        $keys = array_map($callback, ensured_array($keys));

        /** @var array<mixed> $values */
        $values = ensured_array($values);

        if ($ensure) {
            /** @var array<mixed> $values */
            $values = array_map($callback, $values);
        }

        if (count($keys) !== count($values)) {
            throw new Exception("Keys and values arrays must have the same length");
        }

        return array_combine($keys, $values);
    }
}

if (!function_exists('array_cond')) {
    /**
     * Conditional array.
     * Alias of @param  bool|Logic  $condition
     *
     * @param  Arr|array<mixed>  $first
     * @param  array<mixed>|Arr  $second
     *
     * @return array<mixed>
     *
     * @see array_fork
     *
     * @see ArrCond
     */
    function array_cond(bool|Logic $condition, array|Arr $first, array|Arr $second): array
    {
        return array_fork($condition, $first, $second);
    }
}

if (!function_exists('array_exploded')) {
    /**
     * Array exploded.
     *
     * @param  non-empty-string|Txt  $separator
     * @param  string|Txt  $text
     *
     * @return array<mixed>
     *
     * @see ArrExploded
     */
    function array_exploded(string|Txt $separator, string|Txt $text): array
    {
        /** @var non-empty-string $separator */
        $separator = ensured_string($separator);

        return explode($separator, ensured_string($text));
    }
}

if (!function_exists('array_filtered')) {
    /**
     * Array filtered.
     *
     * @param  array<mixed>|Arr  $arr
     * @param  callable  $callback
     *
     * @return array<mixed>
     * @see ArrFiltered
     */
    function array_filtered(array|Arr $arr, callable $callback): array
    {
        return array_filter(
            ensured_array($arr),
            $callback,
            ARRAY_FILTER_USE_BOTH
        );
    }
}

if (!function_exists('array_flatten')) {
    /**
     * Flatten array.
     *
     * @param  array<mixed>|Arr  $arr
     * @param  int  $deep
     *
     * @return array<mixed>
     *
     * @see ArrFlatten
     */
    function array_flatten(array|Arr $arr, int $deep = 1): array
    {
        /**
         * @param  array<mixed>  $array
         * @param  array<mixed>  $new
         * @param  int  $currentDeep
         * @param  int  $deep
         *
         * @return array<mixed>
         */
        $flat = function (array $array, array $new, int $currentDeep, int $deep, callable $self) {
            foreach ($array as $item) {
                if ($deep !== $currentDeep && (is_array($item) || $item instanceof Arr)) {
                    $new = $self(ensured_array($item), $new, $currentDeep + 1, $deep, $self);
                } else {
                    $new[] = $item;
                }
            }

            return $new;
        };

        return $flat(ensured_array($arr), [], 0, $deep, $flat);
    }
}

if (!function_exists('array_fork')) {
    /**
     * Conditional array.
     *
     * @param  bool|Logic  $condition
     * @param  Arr|array<mixed>  $first
     * @param  array<mixed>|Arr  $second
     *
     * @return array<mixed>
     *
     * @see ArrFork
     */
    function array_fork(bool|Logic $condition, array|Arr $first, array|Arr $second): array
    {
        return (array)any_fork($condition, AnyOf::arr($first), AnyOf::arr($second));
    }
}

if (!function_exists('array_if')) {
    /**
     * Conditional array.
     *
     * @param  bool|Logic  $condition
     * @param  Arr|array<mixed>  $arr
     *
     * @return array<mixed>
     *
     * @see ArrIf
     */
    function array_if(bool|Logic $condition, array|Arr $arr): array
    {
        return array_fork($condition, $arr, []);
    }
}

if (!function_exists('array_mapped')) {
    /**
     * Array mapped.
     *
     * @param  array<mixed>|Arr  $arr
     * @return array<mixed>
     *
     * @return array<mixed>
     *
     * @see ArrMapped
     */
    function array_mapped(array|Arr $arr, callable $callback, bool $ensure = true): array
    {
        $count = (new ReflectionFunction(Closure::fromCallable($callback)))->getNumberOfParameters();

        if ($count < 1 || $count > 2) {
            throw new Exception("Invalid amount of arguments");
        }

        $array = ensured_array($arr);

        $arrays = ($isTwo = $count === 2) ? [array_keys($array), $array] : [$array];

        if ($ensure) {
            $callback = $isTwo
                ? fn ($key, $value) => ensured_any(call_user_func($callback, $key, $value))
                : fn ($value) => ensured_any(call_user_func($callback, $value));
        }

        return array_map(
            $callback,
            ...$arrays
        );
    }
}

if (!function_exists('array_merged')) {
    /**
     * Array merged.
     *
     * @param  array<mixed>|Arr  ...$items  Items to be merged
     *
     * @return array<mixed>
     *
     * @see ArrMerged
     */
    function array_merged(array|Arr ...$items): array
    {
        return array_merge(
            ...array_map(
                fn ($arr) => ensured_array($arr),
                $items
            )
        );
    }
}

if (!function_exists('array_single')) {
    /**
     * Single element array.
     *
     * @param  string|int|float|Txt|Num|Any  $key
     * @param  mixed  $value
     *
     * @return array<mixed>
     *
     * @see ArrSingle
     */
    function array_single(string|int|float|Txt|Num|Any $key, mixed $value): array
    {
        return [ensured_any($key) => ensured_any($value)];
    }
}

if (!function_exists('array_sorted')) {
    /**
     * Sorted array.
     *
     * @param  array<mixed>|Arr  $arr
     * @param  callable|string|null  $compare
     *
     * @return array<mixed>
     *
     * @see ArrSorted
     */
    function array_sorted(array|Arr $arr, callable|string|null $compare = null): array
    {
        $arr = ensured_array($arr);

        if ($compare !== null) {
            usort(
                $arr,
                is_string($compare)
                    ? fn ($a, $b) => $a[$compare] <=> $b[$compare]
                    : $compare
            );
        } else {
            sort($arr);
        }

        return $arr;
    }
}

if (!function_exists('array_split')) {
    /**
     * Split array.
     * Alias of @see array_exploded()
     *
     * @param  non-empty-string|Txt  $separator
     *
     * @param  string|Txt  $text
     *
     * @return array<mixed>
     *
     * @see array_exploded
     *
     * @see ArrSplit
     */
    function array_split(string|Txt $separator, string|Txt $text): array
    {
        return array_exploded($separator, $text);
    }
}

if (!function_exists('array_with')) {
    /**
     * Array with an element.
     *
     * @param  array<mixed>|Arr  $arr
     * @param  mixed  $keyOrValue
     * @param  mixed  $value
     *
     * @return array<mixed>
     *
     * @see ArrWith
     */
    function array_with(array|Arr $arr, mixed $keyOrValue, mixed $value = null): array
    {
        $array = ensured_array($arr);

        if ($value === null) {
            $array[] = ensured_any($keyOrValue);
        } else {
            $array[ensured_any($keyOrValue)] = ensured_any($value);
        }

        return $array;
    }
}

if (!function_exists('array_without')) {
    /**
     * Array without an element.
     *
     * @param  array<mixed>|Arr  $arr
     * @param  string|int|Txt|Num  ...$keys
     *
     * @return array<mixed>
     *
     * @see ArrWithout
     */
    function array_without(array|Arr $arr, string|int|Txt|Num ...$keys): array
    {
        $array = ensured_array($arr);

        foreach ($keys as $key) {
            /** @var string|int $key */
            $key = ensured_any($key);

            if (array_key_exists($key, $array)) {
                unset($array[$key]);
            }
        }

        return $array;
    }
}
