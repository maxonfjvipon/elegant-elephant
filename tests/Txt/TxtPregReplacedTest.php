<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Txt;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtPregReplaced;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtPregReplacedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function pregReplacedWithSimpleValues(): void
    {
        $this->assertTxtThat(
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
        $this->assertTxtThat(
            new TxtPregReplaced(["/{[a-z_]+}/", "/\//"], ["[0-9]+", "\/"], '/projects/{project}/update'),
            new IsEqual('\/projects\/[0-9]+\/update')
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function pregReplacedWithTexts(): void
    {
        $this->assertTxtThat(
            new TxtPregReplaced(TxtOf::str("/\s/"), TxtOf::str("x"), "1 2 3"),
            new IsEqual("1x2x3")
        );
    }
}
