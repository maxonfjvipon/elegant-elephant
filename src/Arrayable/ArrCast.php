<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Array cast.
 */
final class ArrCast extends ArrEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable<mixed> $arr
     */
    final public function __construct($arr)
    {
        parent::__construct(
            new ArrMapped(
                $arr,
                fn ($value) => $this->mixedCast($value)
            )
        );
    }
}
