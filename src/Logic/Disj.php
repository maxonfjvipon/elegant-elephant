<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Logic;

use Maxonfjvipon\ElegantElephant\Logic;

/**
 * Disjunction - Logical OR.
 */
final class Disj extends LogicWrap
{
    use EnsureLogic;

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
                    $res = false;

                    /**
                     * @var bool|Logic $arg
                     */
                    foreach ($args as $arg) {
                        if ($this->ensuredBool($arg)) {
                            $res = true;
                            break;
                        }
                    }

                    return $res;
                }
            )
        );
    }
}