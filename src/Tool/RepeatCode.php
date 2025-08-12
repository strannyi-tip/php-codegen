<?php

namespace StrannyiTip\PhpCodegen\Tool;


use StrannyiTip\PhpCodegen\AbstractTool;

/**
 * Repeat code generator.
 */
class RepeatCode extends AbstractTool
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
     * Generate simple repeat.
     *
     * @param int $length Number
     *
     * @return int
     */
    private function generateSimple(int $length): int
    {
        $number = $this->generator->generate(2);

        return intval(str_repeat($number, floor($length / 2)));
    }

    /**
     * Generate complex repeat.
     *
     * @param int $length Number
     *
     * @return int
     */
    private function generateComplex(int $length): int
    {
        $number = $this->generator->generate(2);
        $delimiter = $this->generator->generate(1);
        $final_number = str_repeat($number, floor($length / 2));
        $string_array = str_split($final_number);
        $string_array[($length/2)-1] = substr($number, 1, 1) . $delimiter;

        return intval(implode('', $string_array));
    }
}
