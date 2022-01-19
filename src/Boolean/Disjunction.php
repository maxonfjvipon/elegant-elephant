<?php

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean;

class Disjunction implements Boolean
{

    /**
     * @var Boolean[] $args
     */
    private array $args;

    /**
     * @param Boolean ...$args
     * @return Disjunction
     */
    public static function new(Boolean ...$args): Disjunction
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
            if ($arg->asBool()) {
                return true;
            }
        }
        return false;
    }
}