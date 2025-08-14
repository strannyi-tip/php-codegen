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
    public function generate(int $length): string
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
     * @return string
     */
    private function generateSimple(int $length): string
    {
        $number = $this->generator->generate(2);

        return str_repeat($number, floor($length / 2));
    }

    /**
     * Generate complex repeat.
     *
     * @param int $length Number
     *
     * @return string
     */
    private function generateComplex(int $length): string
    {
        $number = $this->generator->generate(2);
        $delimiter = $this->generator->generate(1);
        $final_number = str_repeat($number, floor($length / 2));
        $string_array = str_split($final_number);
        $string_array[($length/2)-1] = substr($number, 1, 1) . $delimiter;

        return implode('', $string_array);
    }
}
