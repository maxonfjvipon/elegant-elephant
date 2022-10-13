<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar\SclTernary;

/**
 * Num ternary.
 */
final class NumTernary extends NumEnvelope
{
    /**
     * Ctor.
     *
     * @param bool|Boolean $condition
     * @param float|int|callable|Number $first
     * @param float|int|callable|Number $second
     */
    public function __construct($condition, $first, $second)
    {
        parent::__construct(
            new NumberOf(
                new SclTernary(
                    $condition,
                    $first,
                    $second
                )
            )
        );
    }
}
