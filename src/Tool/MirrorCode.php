<?php

namespace StrannyiTip\PhpCodegen\Tool;

use StrannyiTip\PhpCodegen\AbstractTool;


/**
 * Mirror code generator.
 */
class MirrorCode extends AbstractTool
{
    /**
     * @inheritDoc
     */
    public function generate(int $length): string
    {
        return $length%2 === 0 ? $this->generateSimple($length) : $this->generateComplex($length);
    }

    /**
     * Generate simple code.
     *
     * @param int $length Code length
     *
     * @return string
     */
    private function generateSimple(int $length): string
    {
        $number = $this->generator->generate(floor($length/2));
        $mirror = $this->generateMirror($number);

        return $number . $mirror;
    }

    /**
     * Generate complex code.
     *
     * @param int $length Code length
     *
     * @return string
     */
    private function generateComplex(int $length): string
    {
        $number = $this->generator->generate(floor($length/2));
        $mirror = $this->generateMirror(\substr($number, 0, floor($length/2)));
        $delimiter = $this->generator->generate(1);

        return sprintf('%d%d%s', $number, $delimiter, $mirror);
    }

    /**
     * Generate number mirror.
     *
     * @param string $number Number for mirroring
     *
     * @return string
     */
    private function generateMirror(string $number): string
    {
        return \strrev($number);
    }
}
