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
     * @return string
     */
    public function generate(int $length): string;

    /**
     * Set random number generator.
     *
     * @param RandomGeneratorInterface $generator Random generator
     *
     * @return GeneratorToolInterface
     */
    public function setGenerator(RandomGeneratorInterface $generator): GeneratorToolInterface;
}
