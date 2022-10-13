<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Scalar\SclTernary;

/**
 * Ternary array.
 */
final class ArrTernary extends ArrEnvelope
{
    /**
     * Ctor.
     *
     * @param bool|Boolean $condition
     * @param array<mixed>|callable|Arrayable<mixed> $first
     * @param array<mixed>|callable|Arrayable<mixed> $second
     */
    public function __construct($condition, $first, $second)
    {
        parent::__construct(
            new ArrayableOf(
                new SclTernary(
                    $condition,
                    $first,
                    $second
                )
            )
        );
    }
}
