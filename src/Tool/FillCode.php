<?php

namespace StrannyiTip\PhpCodegen\Tool;


use StrannyiTip\PhpCodegen\Configuration;
use StrannyiTip\PhpCodegen\Interfaces\ConfigurationInterface;
use StrannyiTip\PhpCodegen\Interfaces\GeneratorToolInterface;

/**
 * Fill code.
 */
class FillCode implements GeneratorToolInterface
{
    /**
     * Generator.
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
        $length = $configuration->get('length', 6);
        $number = $this->generator->generate((new Configuration())->set('length', 1));

        return intval(\str_repeat($number, $length));
    }
}
