<?php

namespace StrannyiTip\PhpCodegen\Tool;

use StrannyiTip\PhpCodegen\Configuration;
use StrannyiTip\PhpCodegen\Interfaces\ConfigurationInterface;
use StrannyiTip\PhpCodegen\Interfaces\GeneratorToolInterface;


/**
 * Repeat code generator.
 */
class RepeatCode implements GeneratorToolInterface
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
     * Generate simple repeat.
     *
     * @param int $length Number
     *
     * @return int
     */
    private function generateSimple(int $length): int
    {
        $number = $this->generator->generate((new Configuration())->set('length', 2));

        return intval(str_repeat($number, $length / 2));
    }

    /**
     * Generate complex repeat.
     *
     * @param int $length Number
     *
     * @return int
     */
    private function generateComplex(int $length): int
    {
        $number = $this->generator->generate((new Configuration())->set('length', 2));
        $delimiter = $this->generator->generate((new Configuration())->set('length', 1));
        $final_number = str_repeat($number, $length / 2);
        $string_array = str_split($final_number);
        $string_array[($length/2)-1] = substr($number, 1, 1) . $delimiter;

        return intval(implode('', $string_array));
    }
}
