<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use Exception;

use function array_slice;

/**
 * @template T
 */
final class SliceOf implements Arrayee
{
    /**
     * @var Arrayee
     */
    private $arrayee;

    /**
     * @var int
     */
    private $offset;

    /**
     * @var int
     */
    private $length;

    public function __construct(Arrayee $arrayee, int $offset, int $length = 0)
    {
        $this->arrayee = $arrayee;
        $this->offset = $offset;
        $this->length = $length;
    }

    /**
     * @return array<T>
     * @throws Exception
     */
    public function asArray(): array
    {
        return 0 === $this->length ?
            array_slice(
                $this->arrayee->asArray(),
                $this->offset,
                null,
                true
            ) :
            array_slice(
                $this->arrayee->asArray(),
                $this->offset,
                $this->length,
                true
            );
    }
}
