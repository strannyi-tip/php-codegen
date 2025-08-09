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
        $min = pow(10, $configuration->get('length') - 1);
        $max = pow(10, $configuration->get('length')) - 1;

        try {
            $result = \random_int($min, $max);
        } catch (RandomException) {
            $result = $max;
        }

        return $result;
    }
}