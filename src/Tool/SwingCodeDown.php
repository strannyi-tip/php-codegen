<?php

namespace StrannyiTip\PhpCodegen\Tool;

use StrannyiTip\PhpCodegen\AbstractTool;

/**
 * Swing code down.
 */
class SwingCodeDown extends AbstractTool
{
    /**
     * @inheritDoc
     */
    public function generate(int $length): int
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
     * @return int
     */
    private function generateSimple(int $length): int
    {
        $number = $this->generator->generate(floor($length/2));

        return $number . $number - 1;
    }

    /**
     * Generate complex code.
     *
     * @param int $length Code length
     *
     * @return int
     */
    private function generateComplex(int $length): int
    {
        $number = $this->generator->generate(floor($length/2));
        $delimiter = $this->generator->generate(1);

        return intval($number . $delimiter . $number - 1);
    }
}
