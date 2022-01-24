<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;

/**
 * Matches regex.
 * @package Maxonfjvipon\Elegant_Elephant\Logical
 */
final class MatchTo
{
    /**
     * @param string $pattern
     * @return MatchToIn
     */
    public static function string(string $pattern): MatchToIn
    {
        return MatchTo::text(TextOf::string($pattern));
    }

    /**
     * @param Text $pattern
     * @return MatchToIn
     */
    public static function text(Text $pattern): MatchToIn
    {
        return new class($pattern) implements MatchToIn
        {
            /**
             * @var Text $pattern
             */
            private Text $pattern;

            /**
             * Ctor.
             * @param Text $pttrn
             */
            public function __construct(Text $pttrn)
            {
                $this->pattern = $pttrn;
            }

            /**
             * @param string $subject
             * @return Logical
             */
            public function inString(string $subject): Logical
            {
                return $this->inText(TextOf::string($subject));
            }


            public function inText(Text $subject): Logical
            {
                return new class($this->pattern, $subject) implements Logical
                {
                    /**
                     * @var Text $pattern
                     */
                    private Text $pattern;

                    /**
                     * @var Text $subject
                     */
                    private Text $subject;

                    /**
                     * Ctor.
                     * @param Text $pttrn
                     */
                    public function __construct(Text $pttrn, Text $sbjct)
                    {
                        $this->pattern = $pttrn;
                        $this->subject = $sbjct;
                    }

                    /**
                     * @return bool
                     */
                    public function asBool(): bool
                    {
                        return preg_match($this->pattern->asString(), $this->subject->asString());
                    }
                };
            }
        };
    }
}
