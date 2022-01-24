<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Func;
use Maxonfjvipon\Elegant_Elephant\Func\FuncOf;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;
use TypeError;

/**
 * Length of.
 * @package Maxonfjvipon\Elegant_Elephant\Numerable
 */
final class LengthOf implements Numerable
{
    /**
     * @var Func $callback
     */
    private Func $func;

    /**
     * @param Text $text
     * @return LengthOf
     * @throws Exception
     */
    public static function text(Text $text): LengthOf
    {
        return LengthOf::callable(fn() => strlen($text->asString()));
    }

    /**
     * @param string $string
     * @return LengthOf
     */
    public static function string(string $string): LengthOf
    {
        return LengthOf::callable(fn() => strlen($string));
    }

    /**
     * @param Arrayable $arrayable
     * @return LengthOf
     * @throws Exception
     */
    public static function arrayble(Arrayable $arrayable): LengthOf
    {
        return LengthOf::callable(fn() => count($arrayable->asArray()));
    }

    /**
     * @param array $arr
     * @return LengthOf
     */
    public static function array(array $arr): LengthOf
    {
        return LengthOf::callable(fn() => count($arr));
    }

    /**
     * @param callable $callback
     * @return LengthOf
     */
    private static function callable(callable $callback): LengthOf
    {
        return new self(FuncOf::callable($callback));
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
     * @throws Exception|TypeError
     */
    public function asNumber(): string
    {
        return $this->func->apply();
    }
}