<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\TxtOverloadable;

/**
 * Arrayable object
 * behave like [key => Arrayable]
 */
final class ArrObject implements Arrayable
{
    use TxtOverloadable, HasArrIterator;

    /**
     * @var string|Text
     */
    private mixed $key;

    /**
     * @var Arrayable $arrayable
     */
    private Arrayable $origin;

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
     * @param Arrayable $arrayable
     */
    public function __construct(mixed $key, Arrayable $arrayable)
    {
        $this->key = $key;
        $this->origin = $arrayable;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return [$this->key => $this->origin->asArray()];
    }
}