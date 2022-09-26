<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Any;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\CastArrayable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\CastText;

/**
 * Last of.
 */
final class LastOf implements Any
{
    use CastText;
    use CastArrayable;

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
        if (is_array($this->container) || $this->container instanceof Arrayable) {
            $arr = $this->arrayableCast($this->container);

            return $arr[count($arr) - 1];
        }

        return substr($this->textCast($this->container), -1);
    }
}
