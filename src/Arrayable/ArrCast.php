<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;

/**
 * Array cast.
 */
final class ArrCast extends ArrEnvelope
{
    use CastScalar;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable<mixed> $arr
     */
    public function __construct($arr)
    {
        parent::__construct(
            new ArrMapped(
                $arr,
                fn ($value) => $this->scalarCast($value)
            )
        );
    }
}
