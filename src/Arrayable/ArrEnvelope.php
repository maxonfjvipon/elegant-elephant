<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Arrayable envelope.
 */
class ArrEnvelope implements Arrayable
{
    use HasArrayableIterator;
    use CountArrayable;

    /**
     * @var Arrayable<mixed> $origin
     */
    private Arrayable $origin;

    /**
     * Ctor.
     *
     * @param Arrayable<mixed> $origin
     */
    public function __construct(Arrayable $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array
    {
        return $this->origin->asArray();
    }
}
