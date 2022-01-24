<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Negation
 * @package Maxonfjvipon\Elegant_Elephant\Logical
 */
final class Negation implements Logical
{
    /**
     * @var Logical $origin
     */
    private Logical $origin;

    /**
     * @param Logical $origin
     * @return Negation
     */
    public static function new(Logical $origin): Negation
    {
        return new self($origin);
    }

    /**
     * Ctor.
     * @param Logical $origin
     */
    private function __construct(Logical $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return !$this->origin->asBool();
    }
}