<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Arrayable of.
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrayableOf extends ArrEnvelope
{
    use Overloadable, ArrayableOverloaded;

    /**
     * @param mixed ...$array
     * @return ArrayableOf
     */
    public static function items(mixed ...$array): ArrayableOf
    {
        return new self($array);
    }

    /**
     * Ctor wrap.
     * @param array $arr
     * @param bool $override
     * @return ArrayableOf
     */
    public static function new(array $arr, bool $override = true): ArrayableOf
    {
        return new self($arr, $override);
    }

    /**
     * Ctor.
     * @param array $arr
     * @param bool $override
     */
    public function __construct(private array $arr, private bool $override = true)
    {
        parent::__construct(
            new ArrTernary(
                $override,
                fn() => $this->overload(
                    $arr,
                    [[
                        \Closure::class => fn(\Closure $closure) => call_user_func($closure),
                        Arrayable::class => fn(Arrayable $arrayable) => $arrayable->asArray(),
                        Numerable::class => fn(Numerable $numerable) => $numerable->asNumber(),
                        Text::class => fn(Text $text) => $text->asString(),
                        Logical::class => fn(Logical $logical) => $logical->asBool(),
                        Any::class => fn(Any $any) => $any->asAny(),
                    ]]
                ),
                $arr,
            )
        );
    }
}
