<?php

namespace Maxonfjvipon\Elegant_Elephant\Any;

use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Last of.
 */
final class LastOf implements Any
{
    use Overloadable;

    /**
     * Ctor wrap.
     * @param string|Text|array|Arrayable $container
     * @return LastOf
     */
    public static function new(string|Text|array|Arrayable $container): LastOf
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
        if (is_string($this->container)) {
            return substr($this->container, -1);
        } elseif (is_array($this->container)) {
            return $this->container[count($this->container) - 1];
        } elseif ($this->container instanceof Text) {
            return substr($this->container->asString(), -1);
        }
        return ($arr = $this->container->asArray())[count($arr) - 1];
    }
}
