<?php

declare(strict_types=1);

namespace Maxonfjvipon\Phtml\Tests;

use Exception;
use Maxonfjvipon\Phtml\at;
use Maxonfjvipon\Phtml\Attributes;
use PHPUnit\Framework\Constraint\IsEmpty;
use PHPUnit\Framework\Constraint\IsEqual;

final class AttributesTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function emptyAttributes(): void
    {
        $this->assertTxtThat(
            new Attributes(),
            new IsEmpty()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function oneAttribute(): void
    {
        $this->assertTxtThat(
            new Attributes(["class" => "Hello"]),
            new IsEqual("class='Hello'")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function manyAttributes(): void
    {
        $this->assertTxtThat(
            new Attributes([
                'class' => "Hello",
                'id' => "42"
            ]),
            new IsEqual("class='Hello' id='42'")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function withSimpleAttribute(): void
    {
        $this->assertTxtThat(
            new Attributes([
                at::download,
                at::href => '/css/custom.css'
            ]),
            new IsEqual("download href='/css/custom.css'")
        );
    }
}
