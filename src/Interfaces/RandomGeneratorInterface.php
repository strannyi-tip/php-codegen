<?php

namespace StrannyiTip\PhpCodegen\Interfaces;

/**
 * Random number generator.
 */
interface RandomGeneratorInterface
{
    /**
     *  Generate random number by length.
     *
     * @param int $length Number length
     *
     * @return string
     */
    public function generate(int $length): string;
}
