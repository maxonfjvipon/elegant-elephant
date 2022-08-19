<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Logical AND.
 */
final class Conjunction implements Logical
{
    use LogicalOverloadable;

    /**
     * @var Logical[]|bool[] $args
     */
    private array $args;

    /**
     * @param Logical|bool ...$args
     * @return Conjunction
     */
    public static function new(Logical|bool ...$args): Conjunction
    {
        return new self(...$args);
    }

    /**
     * Ctor.
     * @param Logical|bool ...$args
     */
    public function __construct(Logical|bool ...$args)
    {
        $this->args = $args;
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        foreach ($this->args as $arg) {
            if (!$this->firstLogicalOverloaded($arg)) {
                return false;
            }
        }
        return true;
    }
}
