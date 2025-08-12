<?php

namespace StrannyiTip\PhpCodegen;

use StrannyiTip\PhpCodegen\Interfaces\GeneratorToolInterface;
use StrannyiTip\PhpCodegen\Interfaces\RandomGeneratorInterface;

/**
 * Abstract Tool.
 */
abstract class AbstractTool implements Interfaces\GeneratorToolInterface
{
    /**
     * Code generator.
     *
     * @var RandomGeneratorInterface|null
     */
    protected ?RandomGeneratorInterface $generator = null;

    /**
     * Set generator.
     *
     * @param RandomGeneratorInterface $generator Generator
     *
     * @return GeneratorToolInterface
     */
    public function setGenerator(RandomGeneratorInterface $generator): GeneratorToolInterface
    {
        $this->generator = $generator;

        return $this;
    }
}
