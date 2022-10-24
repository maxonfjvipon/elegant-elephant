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
     * @var Any $origin
     */
    private Any $origin;

    /**
     * Ctor.
     *
     * @param Any $any
     */
    public function __construct(Any $any)
    {
        $this->origin = $any;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    final public function value()
    {
        return $this->origin->value();
    }
}
