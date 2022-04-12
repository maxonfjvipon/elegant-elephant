<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOverloaded;

/**
 * Less.
 */
final class Less implements Logical
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
     * @return Less
     */
    public static function new(Numerable|float|int $left, Numerable|float|int $right): Less
    {
        return new self($left, $right);
    }

    /**
     * Ctor.
     * @param Numerable|float|int $left
     * @param Numerable|float|int $right
     */
    public function __construct(Numerable|float|int $left, Numerable|float|int $right)
    {
        $this->right = $right;
        $this->left = $left;
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        $args = $this->numerableOverloaded($this->left, $this->right);
        return $args[0] < $args[1];
    }
}
