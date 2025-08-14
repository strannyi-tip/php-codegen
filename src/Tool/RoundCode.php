<?php

namespace StrannyiTip\PhpCodegen\Tool;

use StrannyiTip\PhpCodegen\AbstractTool;


/**
 * Round generator.
 */
class RoundCode extends AbstractTool
{
    /**
     * @inheritDoc
     */
    public function generate(int $length): string
    {
        $number = $this->generator->generate(1);

        return $number . \str_repeat('0', $length - 1);
    }
}
