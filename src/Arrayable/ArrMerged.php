<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;

/**
 * Merged array.
 */
final class ArrMerged extends ArrEnvelope
{
    use CastScalar;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable<mixed> ...$items
     */
    public function __construct(...$items)
    {
        parent::__construct(
            new ArrFromCallback(
                fn () => array_merge(...$this->scalarsCast(...$items))
            )
        );
    }
}
