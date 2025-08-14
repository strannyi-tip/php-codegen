<?php

namespace StrannyiTip\PhpCodegen\Tool;

use StrannyiTip\PhpCodegen\AbstractTool;

/**
 * Swing code up.
 */
class SwingCodeUp extends AbstractTool
{
    /**
     * @inheritDoc
     */
    public function generate(int $length): string
    {
        return match ($length%2 === 0) {
            true => $this->generateSimple($length),
            false => $this->generateComplex($length),
        };
    }

    /**
     * Generate simple code.
     *
     * @param int $length Code length
     *
     * @return string
     */
    private function generateSimple(int $length): string
    {
        $number = $this->generator->generate(floor($length/2));

        return $number . (intval($number) + 1);
    }

    /**
     * Generate complex code.
     *
     * @param int $length Code length
     *
     * @return string
     */
    private function generateComplex(int $length): string
    {
        $number = $this->generator->generate(floor($length/2));
        $delimiter = $this->generator->generate(1);

        return $number . $delimiter . (intval($number) + 1);
    }
}
