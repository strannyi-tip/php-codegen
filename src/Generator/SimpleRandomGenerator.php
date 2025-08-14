<?php

namespace StrannyiTip\PhpCodegen\Generator;

use StrannyiTip\PhpCodegen\Interfaces\RandomGeneratorInterface;

/**
 * Simple generator.
 */
class SimpleRandomGenerator implements RandomGeneratorInterface
{
    /**
     * @inheritDoc
     */
    public function generate(int $length): string
    {
        $min = \str_repeat('0', $length);
        $max = \str_repeat('9', $length);

        return (string)\mt_rand(intval($min), intval($max));
    }
}
