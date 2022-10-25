<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Logic;

/**
 * Conjunction - Logical AND
 */
final class Conj extends LogicWrap
{
    use EnsureLogic;

    /**
     * @var array<bool|Logic> $args
     */
    private array $args;

    /**
     * Ctor.
     *
     * @param bool|Logic ...$args
     */
    final public function __construct(bool|Logic ...$args)
    {
        parent::__construct(
            LogicOf::func(
                function () use ($args) {
                    $res = true;

                    /**
                     * @var bool|Logic $arg
                     */
                    foreach ($args as $arg) {
                        if (!$this->ensuredBool($arg)) {
                            $res = false;
                            break;
                        }
                    }

                    return $res;
                }
            )
        );
    }
}
