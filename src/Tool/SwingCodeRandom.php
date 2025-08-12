<?php

namespace StrannyiTip\PhpCodegen\Tool;

use StrannyiTip\PhpCodegen\Configuration;
use StrannyiTip\PhpCodegen\Interfaces\ConfigurationInterface;
use StrannyiTip\PhpCodegen\Interfaces\GeneratorToolInterface;

class SwingCodeRandom implements GeneratorToolInterface
{
    /**
     * Code generator.
     *
     * @var SimpleCode
     */
    private SimpleCode $generator;

    public function __construct()
    {
        $this->generator = new SimpleCode();
    }

    /**
     * @inheritDoc
     */
    public function generate(ConfigurationInterface $configuration): int
    {
        $random = $this->generator->generate((new Configuration())->set('length', 1));

        return match ($random%2 === 0) {
            true => (new SwingCodeUp())->generate($configuration),
            false => (new SwingCodeDown())->generate($configuration),
        };
    }
}