<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Any;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * First item.
 */
final class FirstOf implements Any
{
    /**
     * @var string|array<mixed>|Text|Arrayable $container
     */
    private $container;

    /**
     * Ctor wrap.
     *
     * @param string|array<mixed>|Text|Arrayable $container
     * @return self
     */
    public static function new($container): self
    {
        return new self($container);
    }

    /**
     * Ctor.
     *
     * @param string|array<mixed>|Text|Arrayable $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function asAny()
    {
        if (is_string($this->container) || is_array($this->container)) {
            return $this->container[0];
        }

        if ($this->container instanceof Text) {
            return $this->container->asString()[0];
        }

        return $this->container->asArray()[0];
    }
}
