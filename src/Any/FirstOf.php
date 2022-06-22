<?php

namespace Maxonfjvipon\Elegant_Elephant\Any;

use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * First item.
 */
final class FirstOf implements Any
{
    use Overloadable;

    /**
     * Ctor wrap.
     * @param string|Text|array|Arrayable $container
     * @return FirstOf
     */
    public static function new(string|Text|array|Arrayable $container): FirstOf
    {
        return new self($container);
    }

    /**
     * Ctor
     * @param string|Text|array|Arrayable $container
     */
    public function __construct(private string|Text|array|Arrayable $container)
    {
    }

    /**
     * @inheritDoc
     */
    public function asAny(): mixed
    {
        return $this->overload([$this->container], [[
            'string',
            Text::class => fn(Text $text) => $text->asString(),
            'array',
            Arrayable::class => fn(Arrayable $arrayable) => $arrayable->asArray()
        ]])[0][0];
    }
}