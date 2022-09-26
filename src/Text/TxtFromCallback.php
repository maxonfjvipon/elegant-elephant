<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text from callback
 */
final class TxtFromCallback implements Text
{
    use CastText;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * Ctor wrap.
     *
     * @param callable $callback
     * @return self
     */
    public static function new(callable $callback): self
    {
        return new self($callback);
    }

    /**
     * Ctor.
     *
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return $this->textOrCallableCast($this->callback);
    }
}
