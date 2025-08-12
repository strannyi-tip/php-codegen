<?php

namespace StrannyiTip\PhpCodegen\Tool;

use StrannyiTip\PhpCodegen\Configuration;
use StrannyiTip\PhpCodegen\Interfaces\ConfigurationInterface;
use StrannyiTip\PhpCodegen\Interfaces\GeneratorToolInterface;

/**
 * Swing code up.
 */
class SwingCodeUp implements GeneratorToolInterface
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
        $length = $configuration->get('length', 6);

        return match ($length%2 === 0) {
            true => $this->generateSimple($length),
            false => $this->generateComplex($length),
        };
    }

    /**
     * Generate simple code.
     *
     * @param int $length Code length
     *
     * @return int
     */
    private function generateSimple(int $length): int
    {
        $number = $this->generator->generate((new Configuration())->set('length', floor($length/2)));

        return $number . $number + 1;
    }

    /**
     * Generate complex code.
     *
     * @param int $length Code length
     *
     * @return int
     */
    private function generateComplex(int $length): int
    {
        $number = $this->generator->generate((new Configuration())->set('length', floor($length/2)));
        $delimiter = $this->generator->generate((new Configuration())->set('length', 1));

        return intval($number . $delimiter . $number + 1);
    }
}
