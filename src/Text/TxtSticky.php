<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Cached text.
 */
final class TxtSticky implements Text
{
    use CastText;

    /**
     * @var array<string> $cache
     */
    private array $cache = [];

    /**
     * @var Text $origin
     */
    private Text $origin;

    /**
     * Ctor wrap.
     *
     * @param Text $text
     * @return self
     */
    public static function new(Text $text): self
    {
        return new self($text);
    }

    /**
     * Ctor.
     *
     * @param Text $text
     */
    public function __construct(Text $text)
    {
        $this->origin = $text;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return $this->cache[0] ??= $this->origin->asString();
    }
}
