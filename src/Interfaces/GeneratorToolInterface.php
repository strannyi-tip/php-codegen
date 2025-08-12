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
     * @param int $length Code length
     *
     * @return int
     */
    public function generate(int $length): int;

    /**
     * Set random number generator.
     *
     * @param RandomGeneratorInterface $generator Random generator
     *
     * @return GeneratorToolInterface
     */
    public function setGenerator(RandomGeneratorInterface $generator): GeneratorToolInterface;
}
