<?php

namespace Maxonfjvipon\Elegant_Elephant\Any;

use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * First item.
 */
final class FirstOf implements Any
{
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
        if (is_string($this->container) || is_array($this->container)) {
            return $this->container[0];
        } elseif ($this->container instanceof Text) {
            return $this->container->asString()[0];
        } else {
            return $this->container->asArray()[0];
        }
    }
}