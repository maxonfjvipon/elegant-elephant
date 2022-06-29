<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text from callback
 */
final class TxtFromCallback implements Text
{
    use TxtOverloadable;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * @param callable $callback
     * @return TxtFromCallback
     */
    public static function new(callable $callback): TxtFromCallback
    {
        return new self($callback);
    }

    /**
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->firstTxtOverloaded($this->callback);
    }
}
