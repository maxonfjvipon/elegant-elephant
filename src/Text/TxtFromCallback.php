<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text from callback
 */
final class TxtFromCallback implements StringableText
{
    use CastMixed;
    use TextToString;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * Ctor.
     *
     * @param callable $callback
     */
    final public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return string
     * @throws Exception
     */
    final public function asString(): string
    {
        return (string) $this->mixedOrCallableCast($this->callback);
    }
}
