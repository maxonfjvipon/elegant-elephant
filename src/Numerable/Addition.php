<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\OverloadedElephant\Overloadable;
use TypeError;

final class Addition implements Numerable
{
    use Overloadable;

    /**
     * @var float|int|string|Numerable $addTo
     */
    private float|int|string|Numerable $addTo;

    /**
     * @var float|int|string|Numerable $toAdd
     */
    private float|int|string|Numerable $toAdd;

    /**
     * @param float|int|string|Numerable $addTo
     * @param float|int|string|Numerable $toAdd
     * @return Addition
     */
    public static function new(float|int|string|Numerable $addTo, float|int|string|Numerable $toAdd): Addition
    {
        return new self($addTo, $toAdd);
    }

    /**
     * Ctor.
     * @param float|int|string|Numerable $addTo
     * @param float|int|string|Numerable $toAdd
     */
    public function __construct(float|int|string|Numerable $addTo, float|int|string|Numerable $toAdd)
    {
        $this->addTo = $addTo;
        $this->toAdd = $toAdd;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): float|int
    {
        $operands = self::overload([$this->addTo, $this->toAdd], [[
            'double',
            'integer',
            'string' => fn(string $str) => $str * 1,
            Numerable::class => fn(Numerable $numerable) => $numerable->asNumber()
        ]]);
        return $operands[0] + $operands[1];
    }
}