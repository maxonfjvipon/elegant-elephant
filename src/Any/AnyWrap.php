<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Any;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;

/**
 * Amy wrap.
 */
abstract class AnyWrap implements Any
{
    /**
     * Ctor.
     * @param Any $origin
     */
    public function __construct(private Any $origin)
    {
    }

    /**
     * @return mixed
     * @throws Exception
     */
    final public function value(): mixed
    {
        return $this->origin->value();
    }
}
