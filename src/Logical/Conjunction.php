<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Logical AND.
 */
final class Conjunction implements Logical
{
    use CastLogical;

    /**
     * @var array<bool|Logical> $args
     */
    private array $args;

    /**
     * Ctor wrap.
     *
     * @param bool|Logical ...$args
     * @return self
     */
    public static function new(...$args): self
    {
        return new self(...$args);
    }

    /**
     * Ctor.
     *
     * @param bool|Logical ...$args
     */
    public function __construct(...$args)
    {
        $this->args = $args;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function asBool(): bool
    {
        /** @var bool|Logical $arg */
        foreach ($this->args as $arg) {
            if (!$this->logicalCast($arg)) {
                return false;
            }
        }

        return true;
    }
}
