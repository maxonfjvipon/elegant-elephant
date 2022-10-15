<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TxtPregReplaced;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtPregReplacedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function pregReplacedWithSingleValues(): void
    {
        $this->assertScalarThat(
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
        $this->assertScalarThat(
            new TxtPregReplaced(["/{[a-z_]+}/", "/\//"], ["[0-9]+", "\/"], '/projects/{project}/update'),
            new IsEqual('\/projects\/[0-9]+\/update')
        );
    }
}
