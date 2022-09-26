<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Represents {@see Arrayable} if {@code $condition} is TRUE
 * [] otherwise
 */
final class ArrIf extends ArrEnvelope
{
    /**
     * Ctor wrap.
     *
     * @param bool|Logical $condition
     * @param array<mixed>|callable|Arrayable $arr
     * @return self
     */
    public static function new($condition, $arr): self
    {
        return new self($condition, $arr);
    }

    /**
     * Ctor.
     * @param bool|Logical $condition
     * @param array<mixed>|callable|Arrayable $arr
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
