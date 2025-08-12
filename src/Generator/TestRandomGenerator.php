<?php

namespace StrannyiTip\PhpCodegen\Generator;

use StrannyiTip\PhpCodegen\Interfaces\RandomGeneratorInterface;

/**
 * Random generator for tests only.
 */
class TestRandomGenerator implements RandomGeneratorInterface
{
    /**
     * @inheritDoc
     */
    public function generate(int $length): int
    {
        return 1 === $length ? 7 : intval(\substr(\str_repeat('54', round($length/2)), 0, $length));
    }
}