<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\CastText;

/**
 * Matches regex.
 */
final class PregMatch implements Boolean
{
    use CastScalar;

    /**
     * @var string|Text $pattern
     */
    private $pattern;

    /**
     * @var string|Text $subject
     */
    private $subject;

    /**
     * Ctor.
     *
     * @param string|Text $pattern
     * @param string|Text $subject
     */
    public function __construct($pattern, $subject)
    {
        $this->pattern = $pattern;
        $this->subject = $subject;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function value(): bool
    {
        return (bool) preg_match(...$this->scalarsCast($this->pattern, $this->subject));
    }
}