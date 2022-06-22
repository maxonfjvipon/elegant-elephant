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
     * @var array $array
     */
    private array $array;

    /**
     * @var bool $override
     */
    private bool $override;

    /**
     * @var array $rules
     */
    private array $rules;

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
     * @param array $rules
     * @return ArrayableOf
     */
    public static function new(array $arr, bool $override = true, array $rules = []): ArrayableOf
    {
        return new self($arr, $override, $rules);
    }

    /**
     * Ctor.
     * @param array $arr
     * @param bool $override
     * @param array $rules
     */
    public function __construct(array $arr, bool $override = true, array $rules = [])
    {
        parent::__construct(
            new ArrTernary(
                $override,
                fn() => $this->overload(
                    $arr,
                    [[
                        'integer',
                        'double',
                        'boolean',
                        'string',
                        'array',
                        'null',
                        \Closure::class => fn(\Closure $closure) => call_user_func($closure),
                        Arrayable::class => fn(Arrayable $arrayable) => $arrayable->asArray(),
                        Numerable::class => fn(Numerable $numerable) => $numerable->asNumber(),
                        Text::class => fn(Text $text) => $text->asString(),
                        Logical::class => fn(Logical $logical) => $logical->asBool(),
                        Any::class => fn(Any $any) => $any->asAny(),
                        ...$rules,
                    ]]
                ),
                $arr,
            )
        );
    }
}
