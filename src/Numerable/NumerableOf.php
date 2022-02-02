<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Numerable of.
 * @package Maxonfjvipon\Elegant_Elephant\Numerable
 */
final class NumerableOf implements Numerable
{
    use Overloadable;

    /**
     * @var float|int|string $origin
     */
    private float|int|string $origin;

    /**
     * @param float|int|string $num
     * @return NumerableOf
     */
    public static function new(float|int|string $num): NumerableOf
    {
        return new self($num);
    }

    /**
     * Ctor.
     * @param float|int|string $num
     */
    public function __construct(float|int|string $num)
    {
        $this->origin = $num;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        return self::overload([$this->origin], [[
            'double',
            'integer',
            'string' => fn(string $num) => $num * 1
        ]])[0];
    }
}