<?php

namespace unit;

use StrannyiTip\PhpCodegen\CodeGenerator;
use UnitTester;

class CodeGeneratorTest extends \Codeception\Test\Unit
{
    protected UnitTester $tester;

    protected CodeGenerator $generator;

    protected function _before(): void
    {
        $this->generator = new CodeGenerator();
    }
    public function testGenerate()
    {
        $number = $this->generator->generate(6);
        $this->tester->assertEquals(6, \strlen($number), "Test for generate expected length");
    }
}
