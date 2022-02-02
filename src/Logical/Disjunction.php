<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\OverloadedElephant\Overloadable;

final class Disjunction implements Logical
{

    use Overloadable;

    /**
     * @var Logical[]|bool[] $args
     */
    private array $args;

    /**
     * @param Logical|bool ...$args
     * @return Disjunction
     */
    public static function new(Logical|bool ...$args): Disjunction
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
        foreach (self::overload($this->args, [[
            'boolean' => fn(bool $bool) => LogicalOf::bool($bool),
            Logical::class
        ]]) as $arg) {
            if ($arg->asBool()) {
                return true;
            }
        }
        return false;
    }
}