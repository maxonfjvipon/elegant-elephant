<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Any;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;

/**
 * Any envelope.
 */
class AnyEnvelope implements Any
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
    public function asAny()
    {
        return $this->origin->asAny();
    }
}
