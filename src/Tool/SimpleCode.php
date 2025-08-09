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
        $result = '';
        for ($i = 0; $i < $configuration->get('length', 4); $i++) {
            try {
                $result .= \random_int(0, 9);
            } catch (RandomException $e) {
                $result .= 0;
            }
        }

        return $result;
    }
}