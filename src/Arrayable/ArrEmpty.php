<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Empty array.
 */
final class ArrEmpty extends ArrEnvelope
{
    /**
     * Ctor.
     */
    final public function __construct()
    {
        parent::__construct(
            new ArrayableOf([])
        );
    }
}
