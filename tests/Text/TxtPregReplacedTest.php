<?php

namespace Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TxtPregReplaced;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class TxtPregReplacedTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function pregReplacedWithSingleValues(): void
    {
        $this->assertScalarThat(
            TxtPregReplaced("/{[a-z_]+}/", "[0-9]+", '/projects/{project}/update')->value(),
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
            TxtPregReplaced(["/{[a-z_]+}/", "/\//"], ["[0-9]+", "\/"], '/projects/{project}/update')->value(),
            new IsEqual('\/projects\/[0-9]+\/update')
        );
    }
}
