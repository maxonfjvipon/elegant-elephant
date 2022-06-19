<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable envelope.
 */
class ArrEnvelope extends ArrayableIterable
{
    /**
     * @var Arrayable $origin
     */
    private Arrayable $origin;

    /**
     * Ctor.
     * @param Arrayable $arrayable
     */
    public function __construct(Arrayable $arrayable)
    {
        $this->origin = $arrayable;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return $this->origin->asArray();
    }
}