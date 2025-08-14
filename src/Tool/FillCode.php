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
    public function generate(int $length): string
    {
        $number = $this->generator->generate(1);

        return \str_repeat($number, $length);
    }
}
