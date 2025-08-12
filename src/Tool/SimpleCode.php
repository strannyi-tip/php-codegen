<?php

namespace StrannyiTip\PhpCodegen\Tool;

use Random\RandomException;
use StrannyiTip\PhpCodegen\Interfaces\ConfigurationInterface;
use StrannyiTip\PhpCodegen\Interfaces\GeneratorToolInterface;

/**
 * Simple random number.
 */
class SimpleCode implements GeneratorToolInterface
{

    /**
     * @inheritDoc
     */
    public function generate(ConfigurationInterface $configuration): int
    {
        $length = $configuration->get('length');

        $min = \str_repeat('1', $length);
        $max = \str_repeat('9', $length);

        return \mt_rand(intval($min), intval($max));
    }
}