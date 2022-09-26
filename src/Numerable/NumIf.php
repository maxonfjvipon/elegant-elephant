<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Numerable;

/**
 * Numerable if.
 */
final class NumIf extends NumEnvelope
{
    /**
     * Ctor wrap.
     *
     * @param bool|Logical $condition
     * @param float|int|callable|Numerable $num
     * @return self
     */
    public static function new($condition, $num): self
    {
        return new self($condition, $num);
    }

    /**
     * Ctor.
     *
     * @param bool|Logical $condition
     * @param float|int|callable|Numerable $num
     */
    public function __construct($condition, $num)
    {
        parent::__construct(
            new NumTernary(
                $condition,
                $num,
                0
            )
        );
    }
}
