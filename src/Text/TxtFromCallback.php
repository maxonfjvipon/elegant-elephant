<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text from callback
 */
final class TxtFromCallback implements Text
{
    use CastScalar;
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
    public function value(): string
    {
        return (string) $this->scalarOrCallableCast($this->callback);
    }
}
