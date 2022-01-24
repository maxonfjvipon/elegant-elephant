<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use TypeError;

final class Addition implements Numerable
{
    /**
     * @var Numerable $addTo
     */
    private Numerable $addTo;

    /**
     * @var Numerable $toAdd
     */
    private Numerable $toAdd;

    /**
     * @param Numerable $addTo
     * @param Numerable $toAdd
     * @return Addition
     */
    public static function new(Numerable $addTo, Numerable $toAdd): Addition
    {
        return new self($addTo, $toAdd);
    }

    /**
     * Ctor.
     * @param Numerable $addTo
     * @param Numerable $toAdd
     */
    private function __construct(Numerable $addTo, Numerable $toAdd)
    {
        $this->addTo = $addTo;
        $this->toAdd = $toAdd;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): string
    {
        return +$this->addTo->asNumber() + +$this->toAdd->asNumber();
    }
}