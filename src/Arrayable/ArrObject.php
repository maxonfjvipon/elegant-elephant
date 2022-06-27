<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\TxtOverloadable;

/**
 * Arrayable object
 * behave like [key => object]
 */
final class ArrObject extends ArrayableIterable
{
    use TxtOverloadable;

    /**
     * @var string|Text
     */
    private mixed $key;

    /**
     * @var mixed $arrayable
     */
    private mixed $origin;

    /**
     * Ctor wrap.
     * @param mixed $key
     * @param Arrayable $arrayable
     * @return ArrObject
     */
    public static function new(mixed $key, Arrayable $arrayable)
    {
        return new self($key, $arrayable);
    }

    /**
     * Ctor.
     * @param mixed $key
     * @param mixed $object
     */
    public function __construct(
        mixed $key,
        mixed $object
    )
    {
        $this->key = $key;
        $this->origin = $object;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return [$this->key => $this->overload([$this->origin], [[
            Arrayable::class => fn(Arrayable $arrayable) => $arrayable->asArray(),
            Text::class => fn(Text $text) => $text->asString(),
            Numerable::class => fn(Numerable $numerable) => $numerable->asNumber(),
            Logical::class => fn(Logical $logical) => $logical->asBool(),
            \Closure::class => fn(\Closure $closure) => call_user_func($closure),
            Any::class => fn(Any $any) => $any->asAny(),
        ]])[0]];
    }
}