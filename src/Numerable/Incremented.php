<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;

final class Incremented implements Numerable
{
    /**
     * @var Numerable $origin
     */
    private Numerable $origin;

    /**
     * @param Numerable $origin
     * @return Incremented
     */
    public static function new(Numerable $origin): Incremented
    {
        return new self($origin);
    }

    /**
     * Ctor.
     * @param Numerable $origin
     */
    private function __construct(Numerable $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): string
    {
        return Addition::new(
            $this->origin,
            NumerableOf::int(1)
        )->asNumber();
    }
}
