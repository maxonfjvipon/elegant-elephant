<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Array keys.
 */
final class ArrKeys extends ArrEnvelope
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
                fn () => array_keys((array) $this->mixedCast($arr))
            )
        );
    }
}
