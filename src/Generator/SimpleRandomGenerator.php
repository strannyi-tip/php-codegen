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
    public function generate(int $length): int
    {
        $min = \str_repeat('1', $length);
        $max = \str_repeat('9', $length);

        return \mt_rand(intval($min), intval($max));
    }
}
