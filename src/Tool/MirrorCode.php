<?php

namespace StrannyiTip\PhpCodegen\Tool;

use StrannyiTip\PhpCodegen\Configuration;
use StrannyiTip\PhpCodegen\Interfaces\ConfigurationInterface;
use StrannyiTip\PhpCodegen\Interfaces\GeneratorToolInterface;


/**
 * Mirror code generator.
 */
class MirrorCode implements GeneratorToolInterface
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

        return $length%2 === 0 ? $this->generateSimple($length) : $this->generateComplex($length);
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
        $number = $this->generator->generate((new Configuration())->set('length', $length/2));
        $mirror = $this->generateMirror($number);

        return $number . $mirror;
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
        $number = $this->generator->generate((new Configuration())->set('length', $length/2));
        $mirror = $this->generateMirror(intval(\substr($number, 0, $length/2)));

        return $number . $mirror;
    }

    /**
     * Generate number mirror.
     *
     * @param int $number Number for mirroring
     *
     * @return int
     */
    private function generateMirror(int $number): int
    {
        return \strrev((string)$number);
    }
}
