<?php

namespace Maxonfjvipon\Elegant_Elephant\Any;

use Exception;
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
        return $this->overload([$this->container], [[
            'string' => fn(string $str) => substr($str, -1),
            Text::class => fn(Text $text) => substr($text->asString(), -1),
            'array' => fn(array $array) => $array[count($array) - 1],
            Arrayable::class => fn(Arrayable $arrayable) => ($arr = $arrayable->asArray())[count($arr) - 1]
        ]])[0];
    }
}