<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text envelope.
 */
class TxtEnvelope implements Text
{
    use StringableText;

    /**
     * @var Text $origin
     */
    private Text $origin;

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
        return $this->origin->asString();
    }
}
