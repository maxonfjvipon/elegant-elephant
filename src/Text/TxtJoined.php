<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text joined.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtJoined implements Text
{
    /**
     * @var array<string|Text> $args
     */
    private array $args;

    /**
     * @param string|Text ...$args
     * @return TxtJoined
     */
    public static function new(string|Text ...$args): TxtJoined
    {
        return new self(...$args);
    }

    /**
     * Ctor.
     * @param string|Text ...$args
     */
    public function __construct(string|Text...$args)
    {
        $this->args = $args;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return TxtImploded::new(TxtBlank::new(), ...$this->args)->asString();
    }
}
