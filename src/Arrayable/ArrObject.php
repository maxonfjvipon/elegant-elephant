<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text\CastText;

/**
 * Array as object.
 */
final class ArrObject extends AbstractArrayable
{
    use CastText;
    use CastMixed;

    /**
     * @var mixed $key
     */
    private $key;

    /**
     * @var mixed $object
     */
    private $object;

    /**
     * Ctor wrap.
     *
     * @param mixed $key
     * @param mixed $object
     * @return self
     */
    public static function new($key, $object): self
    {
        return new self($key, $object);
    }

    /**
     * Ctor.
     *
     * @param mixed $key
     * @param mixed $object
     */
    public function __construct($key, $object)
    {
        $this->key = $key;
        $this->object = $object;
    }

    /**
     * @return array<mixed, mixed>
     * @throws Exception
     */
    public function asArray(): array
    {
        return [$this->castMixed($this->key) => $this->castMixed($this->object)];
    }
}
