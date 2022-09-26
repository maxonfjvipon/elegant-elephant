<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\CastText;

/**
 * Array exploded.
 */
final class ArrExploded extends AbstractArrayable
{
    use CastText;

    /**
     * @var non-empty-string|Text $separator
     */
    private $separator;

    /**
     * @var string|Text $origin
     */
    private $origin;

    /**
     * Exploded by comma.
     *
     * @param string|Text $text
     * @return self
     */
    public static function byComma($text): self
    {
        return new self(",", $text);
    }

    /**
     * Ctor wrap.
     *
     * @param non-empty-string|Text $separator
     * @param string|Text $text
     * @return self
     */
    public static function new($separator, $text): self
    {
        return new self($separator, $text);
    }

    /**
     * Ctor.
     *
     * @param non-empty-string|Text $separator
     * @param string|Text $text
     */
    public function __construct($separator, $text)
    {
        $this->separator = $separator;
        $this->origin = $text;
    }

    /**
     * @return array<int, string>
     * @throws Exception
     */
    public function asArray(): array
    {
        $exploded = explode($this->textCast($this->separator), $this->textCast($this->origin));

        if ($exploded === false) {
            throw new Exception("Separator can't be an empty string or instance of TxtBlank class");
        }

        return $exploded;
    }
}
