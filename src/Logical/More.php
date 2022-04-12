<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOverloaded;

/**
 * More.
 */
final class More implements Logical
{
    use NumerableOverloaded;

    /**
     * @var Numerable|float|int $left
     */
    private Numerable|float|int $left;

    /**
     * @var Numerable|float|int $right
     */
    private Numerable|float|int $right;

    /**
     * Ctor wrap.
     * @param Numerable|float|int $left
     * @param Numerable|float|int $right
     * @return More
     */
    public static function new(float|int|Numerable $left, float|int|Numerable $right): More
    {
        return new self($left, $right);
    }

    /**
     * Ctor.
     * @param Numerable|float|int $left
     * @param Numerable|float|int $right
     */
    public function __construct(float|int|Numerable $left, float|int|Numerable $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        $args = $this->numerableOverloaded($this->left, $this->right);
        return $args[0] > $args[1];
    }
}