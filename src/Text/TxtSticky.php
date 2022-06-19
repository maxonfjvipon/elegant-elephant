<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

final class TxtSticky implements Text
{
    use TxtOverloadable;

    /**
     * @var Text $text
     */
    private Text $text;

    /**
     * @var array $cache
     */
    private array $cache = [];
    
    /**
     * Ctor wrap.
     * @param Text $text
     * @return TxtSticky
     */
    public static function new(Text $text): self
    {
        return new self($text);
    }

    /**
     * Ctor.
     * @param Text $text
     */
    public function __construct(Text $text)
    {
        $this->text = $text;   
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->cache[0] ??= $this->text->asString();
    }
}