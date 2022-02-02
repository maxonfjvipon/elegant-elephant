<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMapped;
use Maxonfjvipon\Elegant_Elephant\Text;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

/**
 * Text joined.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtJoined implements Text
{
    /**
     * @var string[] $args
     */
    private array $args;

    /**
     * @param mixed ...$args
     * @return TxtJoined
     */
    public static function new(...$args): TxtJoined
    {
        return new self(...$args);
    }

    /**
     * Ctor.
     * @param mixed ...$args
     */
    public function __construct(...$args)
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
