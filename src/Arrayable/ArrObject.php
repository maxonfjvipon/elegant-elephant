<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text\TxtOverloadable;

/**
 * Arrayable object
 * behave like [key => object]
 */
final class ArrObject extends ArrayableIterable
{
    use TxtOverloadable, CastMixed;

    /**
     * Ctor wrap.
     * @param mixed $key
     * @param mixed $object
     * @return ArrObject
     */
    public static function new(mixed $key, mixed $object)
    {
        return new self($key, $object);
    }

    /**
     * Ctor.
     * @param mixed $key
     * @param mixed $object
     */
    public function __construct(private mixed $key, private mixed $object)
    {
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return [$this->key => $this->castMixed($this->object)];
    }
}
