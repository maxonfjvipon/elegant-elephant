<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Func;
use Maxonfjvipon\Elegant_Elephant\Func\FuncOf;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;
use TypeError;

/**
 * Length of.
 * @package Maxonfjvipon\Elegant_Elephant\Numerable
 */
final class LengthOf implements Numerable
{
    use Overloadable;

    /**
     * @var array|Arrayable|Text|string $arg
     */
    private Text|string|array|Arrayable $arg;

    /**
     * @param Text|string|array|Arrayable $arg
     * @return LengthOf
     */
    public static function new(Text|string|array|Arrayable $arg): LengthOf
    {
        return new self($arg);
    }

    /**
     * Ctor.
     * @param Text|string|array|Arrayable $arg
     */
    public function __construct(Text|string|array|Arrayable $arg)
    {
        $this->arg = $arg;
    }

    /**
     * @inheritDoc
     * @throws Exception|TypeError
     */
    public function asNumber(): float|int
    {
        return $this->overload([$this->arg], [[
            'string'            => fn(string $str) => strlen($str),
            'array'             => fn(array $arr) => count($arr),
            Text::class         => fn(Text $text) => strlen($text->asString()),
            Arrayable::class    => fn(Arrayable $arr) => count($arr->asArray())
        ]])[0];
    }
}