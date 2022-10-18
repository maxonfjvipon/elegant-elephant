<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Logical AND.
 */
final class Conjunction implements Boolean
{
    use CastMixed;

    /**
     * @var array<bool|Boolean> $args
     */
    private array $args;

    /**
     * Ctor.
     *
     * @param bool|Boolean ...$args
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
        $res = true;

        /** @var bool|Boolean $arg */
        foreach ($this->args as $arg) {
            if (!(bool) $this->mixedCast($arg)) {
                $res = false;
                break;
            }
        }

        return $res;
    }
}
