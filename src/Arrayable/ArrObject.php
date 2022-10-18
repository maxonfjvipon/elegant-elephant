<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Array as object.
 */
final class ArrObject extends ArrEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param string|int|float|Text|Number $key
     * @param mixed $object
     */
    final public function __construct($key, $object)
    {
        parent::__construct(
            new ArrFromCallback(
                fn () => [$this->mixedCast($key) => $this->mixedCast($object)]
            )
        );
    }
}
