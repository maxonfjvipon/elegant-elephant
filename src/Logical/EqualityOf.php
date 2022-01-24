<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Func;
use Maxonfjvipon\Elegant_Elephant\Func\FuncOf;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Equality of.
 * @package Maxonfjvipon\Elegant_Elephant\Logical
 */
final class EqualityOf implements Logical
{
    /**
     * @var Func $func
     */
    private Func $func;

    /**
     * @param Text $text1
     * @param Text $text2
     * @return EqualityOf
     * @throws Exception
     */
    public static function texts(Text $text1, Text $text2): EqualityOf
    {
        return EqualityOf::callable(fn() => $text1->asString() === $text2->asString());
    }

    /**
     * @param string $str1
     * @param string $str2
     * @return EqualityOf
     */
    public static function strings(string $str1, string $str2): EqualityOf
    {
        return EqualityOf::callable(fn() => $str1 === $str2);
    }

    /**
     * @param Arrayable $arr1
     * @param Arrayable $arr2
     * @return EqualityOf
     */
    public static function arrayables(Arrayable $arr1, Arrayable $arr2): EqualityOf
    {
        return EqualityOf::callable(fn() => $arr1->asArray() === $arr2->asArray());
    }

    /**
     * @param array $arr1
     * @param array $arr2
     * @return EqualityOf
     */
    public static function arrays(array $arr1, array $arr2): EqualityOf
    {
        return EqualityOf::callable(fn() => $arr1 === $arr2);
    }

    /**
     * @param Numerable $num1
     * @param Numerable $num2
     * @return EqualityOf
     */
    public static function numerables(Numerable $num1, Numerable $num2): EqualityOf
    {
        return EqualityOf::callable(fn() => $num1->asNumber() === $num2->asNumber());
    }

    /**
     * @param callable $callable
     * @return EqualityOf
     */
    private static function callable(callable $callable): EqualityOf
    {
        return new self(FuncOf::callable($callable));
    }

    /**
     * Ctor.
     * @param Func $func
     */
    private function __construct(Func $func)
    {
        $this->func = $func;
    }


    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return $this->func->apply();
    }
}