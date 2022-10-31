<?php

declare(strict_types=1);

namespace Maxonfjvipon\Phtml\Tests;
use Exception;
use Maxonfjvipon\ElegantElephant\Logic;
use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\Phtml\Attributes;
use Maxonfjvipon\Phtml\Tag;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * @param Tag|Txt|Attributes $tag
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    protected function assertTxtThat(
        Tag|Txt|Attributes $tag,
        Constraint $constraint,
        string $message = ''
    ): void
    {
        $this->assertThat(
            $tag->asString(),
            $constraint,
            $message
        );
    }

    /**
     * @param Logic $logic
     * @param Constraint $constraint
     * @param string $message
     * @return void
     * @throws Exception
     */
    public function assertLogicThat(
        Logic $logic,
        Constraint $constraint,
        string $message = ''
    ): void
    {
        $this->assertThat(
            $logic->asBool(),
            $constraint,
            $message
        );
    }
}