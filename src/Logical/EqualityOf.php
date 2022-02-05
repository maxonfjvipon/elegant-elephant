<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Func;
use Maxonfjvipon\Elegant_Elephant\Func\FuncOf;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Equality of.
 * @package Maxonfjvipon\Elegant_Elephant\Logical
 */
final class EqualityOf implements Logical
{
    use Overloadable;

    /**
     * @var string|int|float|Text|array|Arrayable|Logical|Numerable
     */
    private string|int|float|Text|array|Arrayable|Logical|Numerable $arg1;

    /**
     * @var string|int|float|Text|array|Arrayable|Logical|Numerable
     */
    private string|int|float|Text|array|Arrayable|Logical|Numerable $arg2;

    /**
     * @param string|int|float|Text|array|Arrayable|Logical|Numerable $arg1
     * @param string|int|float|Text|array|Arrayable|Logical|Numerable $arg2
     * @return EqualityOf
     */
    public static function new(
        string|int|float|Text|array|Arrayable|Logical|Numerable $arg1,
        string|int|float|Text|array|Arrayable|Logical|Numerable $arg2
    ) {
        return new self($arg1, $arg2);
    }

    /**
     * Ctor.
     * @param string|int|float|Text|array|Arrayable|Logical|Numerable $arg1
     * @param string|int|float|Text|array|Arrayable|Logical|Numerable $arg2
     */
    public function __construct(
        string|int|float|Text|array|Arrayable|Logical|Numerable $arg1,
        string|int|float|Text|array|Arrayable|Logical|Numerable $arg2
    ) {
        $this->arg1 = $arg1;
        $this->arg2 = $arg2;
    }


    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        $operands = $this->overload([$this->arg1, $this->arg2], [[
            'string',
            'integer',
            'double',
            'array',
            Text::class         => fn(Text $txt) => $txt->asString(),
            Arrayable::class    => fn(Arrayable $arr) => $arr->asArray(),
            Logical::class      => fn(Logical $logical) => $logical->asBool(),
            Numerable::class    => fn(Numerable $num) => $num->asNumber()
        ]]);
        return $operands[0] === $operands[1];
    }
}
