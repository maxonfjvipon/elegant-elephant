<?php

namespace Maxonfjvipon\Elegant_Elephant\Any;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * At key.
 */
final class AtKey implements Any
{
    use Arrayable\ArrayableOverloaded;
    use CastMixed;

    /**
     * Ctor.
     *
     * @param string|Text $key
     * @param array|Arrayable $arr
     */
    public function __construct(private array|Arrayable $arr, private mixed $key)
    {
    }

    /**
     * @inheritDoc
     */
    public function asAny(): mixed
    {
        return $this->firstArrayableOverloaded($this->arr)[$this->castMixed($this->key)];
    }
}
