<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;

/**
 * Unique array.
 */
final class ArrUnique extends ArrEnvelope
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
            new ArrFromCallback(
                fn () => array_unique((array)$this->scalarCast($arr))
            )
        );
    }
}
