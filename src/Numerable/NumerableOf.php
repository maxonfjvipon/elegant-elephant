<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Numerable of.
 * @package Maxonfjvipon\Elegant_Elephant\Numerable
 */
final class NumerableOf implements Numerable
{
    use Overloadable;

    /**
     * @var float|int|Text|string $origin
     */
    private float|int|string|Text $origin;

    /**
     * @param float|int|Text|string $num
     * @return NumerableOf
     */
    public static function new(float|int|Text|string $num): NumerableOf
    {
        return new self($num);
    }

    /**
     * Ctor.
     * @param float|int|Text|string $num
     */
    public function __construct(float|int|Text|string $num)
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
            'string'    => fn(string $num) => $num * 1,
            Text::class => fn(Text $text) => $text->asString() * 1
        ]])[0];
    }
}