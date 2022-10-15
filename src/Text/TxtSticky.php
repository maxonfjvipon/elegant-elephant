<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Cached text.
 */
final class TxtSticky extends TxtEnvelope
{
    /**
     * @var array<string> $cache
     */
    private array $cache = [];

    /**
     * Ctor.
     *
     * @param Text $text
     */
    public function __construct(Text $text)
    {
        parent::__construct(
            new TxtFromCallback(
                fn () => $this->cache[0] ??= $text->asString()
            )
        );
    }
}
