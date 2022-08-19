<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text joined.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtJoined extends TxtEnvelope
{
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
        parent::__construct(
            new TxtImploded(
                new TxtBlank(),
                ...$args
            )
        );
    }
}
