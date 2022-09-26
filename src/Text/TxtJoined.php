<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text joined.
 */
final class TxtJoined extends TxtEnvelope
{
    /**
     * Ctor wrap.
     *
     * @param string|Text ...$args
     * @return self
     */
    public static function new(...$args): self
    {
        return new self(...$args);
    }

    /**
     * Ctor.
     *
     * @param string|Text ...$args
     */
    public function __construct(...$args)
    {
        parent::__construct(
            new TxtImploded(
                new TxtBlank(),
                ...$args
            )
        );
    }
}
