<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Boolean;

/**
 * Represents {@see Arrayable} if {@code $condition} is TRUE
 * [] otherwise
 */
final class ArrIf extends ArrEnvelope
{
    /**
     * Ctor.
     * @param bool|Boolean $condition
     * @param array<mixed>|callable|Arrayable<mixed> $arr
     */
    public function __construct($condition, $arr)
    {
        parent::__construct(
            new ArrTernary(
                $condition,
                $arr,
                new ArrEmpty()
            )
        );
    }
}
