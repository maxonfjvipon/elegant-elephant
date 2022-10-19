<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable envelope.
 */
abstract class ArrEnvelope implements IterableArrayable
{
    use HasArrayableIterator;

    /**
     * @var Arrayable $origin
     */
    private Arrayable $origin;

    /**
     * Ctor.
     *
     * @param Arrayable $origin
     */
    public function __construct(Arrayable $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    final public function asArray(): array
    {
        return $this->origin->asArray();
    }
}
