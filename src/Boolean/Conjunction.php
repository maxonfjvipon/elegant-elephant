<?php

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Maxonfjvipon\Elegant_Elephant\Logical;

final class Conjunction implements Logical
{
    /**
     * @var Logical[] $args
     */
    private array $args;

    /**
     * @param Logical ...$args
     * @return Conjunction
     */
    public static function new(Logical ...$args): Conjunction
    {
        return new self(...$args);
    }

    /**
     * Ctor.
     * @param Logical ...$args
     */
    private function __construct(Logical ...$args)
    {
        $this->args = $args;
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        foreach ($this->args as $arg) {
            if (!$arg->asBool()) {
                return false;
            }
        }
        return true;
    }
}
