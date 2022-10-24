<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtPregReplaced;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtPregReplacedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function pregReplacedWithSingleValues(): void
    {
        $this->assertMixedCastThat(
            new TxtPregReplaced("/{[a-z_]+}/", "[0-9]+", '/projects/{project}/update'),
            new IsEqual('/projects/[0-9]+/update')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function pregReplacedWithArrays(): void
    {
        $this->assertMixedCastThat(
            new TxtPregReplaced(["/{[a-z_]+}/", "/\//"], ["[0-9]+", "\/"], '/projects/{project}/update'),
            new IsEqual('\/projects\/[0-9]+\/update')
        );
    }
}
