<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Reversed array.
 */
final class ArrReversed extends ArrEnvelope
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
            new ArrFromCallback(
                fn () => array_reverse((array) $this->mixedCast($arr))
            )
        );
    }
}
