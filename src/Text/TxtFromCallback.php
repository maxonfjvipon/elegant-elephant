<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text from callback
 */
final class TxtFromCallback implements Text
{
    use CastMixed;
    use StringableText;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * Ctor.
     *
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return (string) $this->mixedOrCallableCast($this->callback);
    }
}
