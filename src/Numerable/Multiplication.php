<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\OverloadedElephant\Overloadable;
use PhpParser\Node\Expr\AssignOp\Mul;

final class Multiplication implements Numerable
{
    use Overloadable;

    /**
     * @var float|int|string|Numerable $arg1
     */
    private float|int|string|Numerable $arg1;

    /**
     * @var float|int|string|Numerable $arg2
     */
    private float|int|string|Numerable $arg2;

    /**
     * @param float|int|string|Numerable $arg1
     * @param float|int|string|Numerable $arg2
     * @return Multiplication
     */
    public static function new(float|int|string|Numerable $arg1, float|int|string|Numerable $arg2): Multiplication
    {
        return new self($arg1, $arg2);
    }

    /**
     * Ctor.
     * @param float|int|string|Numerable $arg1
     * @param float|int|string|Numerable $arg2
     */
    public function __construct(float|int|string|Numerable $arg1, float|int|string|Numerable $arg2)
    {
        $this->arg1 = $arg1;
        $this->arg2 = $arg2;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        $operands = self::overload([$this->arg1, $this->arg2], [[
            'double',
            'integer',
            'string' => fn(string $str) => $str * 1,
            Numerable::class => fn(Numerable $numerable) => $numerable->asNumber()
        ]]);
        return $operands[0] * $operands[1];
    }
}