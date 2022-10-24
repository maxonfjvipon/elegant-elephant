<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Txt;

use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Cached text.
 */
final class TxtSticky extends TxtWrap
{
    /**
     * @var array<string> $cache
     */
    private array $cache = [];

    /**
     * Ctor.
     *
     * @param Txt $txt
     */
    final public function __construct(Txt $txt)
    {
        parent::__construct(
            TxtOf::func(fn () => $this->cache[0] ??= $txt->asString())
        );
    }
}
