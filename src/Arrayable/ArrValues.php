<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Array values
 */
final class ArrValues extends ArrEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable $arr
     */
    final public function __construct($arr)
    {
        parent::__construct(
            new ArrFromCallback(
                fn () => array_values((array) $this->mixedCast($arr))
            )
        );
    }
}
