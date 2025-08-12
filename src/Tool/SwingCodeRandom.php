<?php

namespace StrannyiTip\PhpCodegen\Tool;

use StrannyiTip\PhpCodegen\AbstractTool;

/**
 * Swing random tool.
 */
class SwingCodeRandom extends AbstractTool
{
    /**
     * @inheritDoc
     */
    public function generate(int $length): int
    {
        $random = $this->generator->generate(1);

        return match ($random%2 === 0) {
            true => (new SwingCodeUp())->setGenerator($this->generator)->generate($random),
            false => (new SwingCodeDown())->setGenerator($this->generator)->generate($random),
        };
    }
}
