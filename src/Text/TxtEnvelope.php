<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Txt envelope.
 */
class TxtEnvelope implements Text
{
    /**
     * @var Text $text
     */
    private Text $text;

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
        return $this->text->asString();
    }
}