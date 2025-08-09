<?php

namespace StrannyiTip\PhpCodegen\Interfaces;

/**
 * Generator tool.
 */
interface GeneratorToolInterface
{
    /**
     * Generate code.
     *
     * @param ConfigurationInterface $configuration Completed configuration
     *
     * @return int
     */
    public function generate(ConfigurationInterface $configuration): int;
}
