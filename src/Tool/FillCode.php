<?php

namespace StrannyiTip\PhpCodegen\Tool;


use StrannyiTip\PhpCodegen\AbstractTool;

/**
 * Fill code.
 */
class FillCode extends AbstractTool
{
    /**
     * @inheritDoc
     */
    public function generate(int $length): int
    {
        $number = $this->generator->generate(1);

        return intval(\str_repeat($number, $length));
    }
}
