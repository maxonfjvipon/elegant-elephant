<?php

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Maxonfjvipon\Elegant_Elephant\Boolean;

class Conjunction implements Boolean
{
    /**
     * @var Boolean[] $args
     */
    private array $args;

    /**
     * @param Boolean ...$args
     * @return Conjunction
     */
    public static function new(Boolean ...$args): Conjunction
    {
        return new self(...$args);
    }

    /**
     * Ctor.
     * @param Boolean ...$args
     */
    private function __construct(Boolean ...$args)
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
