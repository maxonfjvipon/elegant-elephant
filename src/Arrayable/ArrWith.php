<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Boolean\IsNull;
use Maxonfjvipon\Elegant_Elephant\Boolean\Not;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Arrayable with an element.
 */
final class ArrWith extends ArrEnvelope
{
    use CastMixed;

    /**
     * @param array<mixed>|Arrayable<mixed> $arr
     * @param mixed $keyOrValue
     * @param mixed|null $value
     */
    public function __construct($arr, $keyOrValue, $value = null)
    {
        parent::__construct(
            new ArrMerged(
                $arr,
                new ArrTernary(
                    new Not(new IsNull($value)),
                    new ArrObject($keyOrValue, $value),
                    fn () => [$this->mixedCast($keyOrValue)]
                )
            )
        );
    }
}
