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
        $number2 = $this->generator->generate(6, CodeGenerator::MIRROR_METHOD);
        $number3 = $this->generator->generate(5, CodeGenerator::MIRROR_METHOD);
        $this->tester->assertEquals(6, \strlen($number2), "Test for generate expected length with mirror simple");
        $this->tester->assertEquals(5, \strlen($number3), "Test for generate expected length with mirror complex");
        $number4 = $this->generator->generate(6, CodeGenerator::REPEAT_METHOD);
        $number5 = $this->generator->generate(5, CodeGenerator::REPEAT_METHOD);
        $this->tester->assertEquals(6, \strlen($number4), "Test for generate expected length with repeat simple");
        $this->tester->assertEquals(5, \strlen($number5), "Test for generate expected length with repeat complex");
        $fill_code = $this->generator->generate(4, CodeGenerator::FILL_METHOD);
        $this->tester->assertEquals(4, \strlen($fill_code), "Test for generate expected length with fill method");
        $round_code = $this->generator->generate(6, CodeGenerator::ROUND_METHOD);
        $this->tester->assertEquals(6, \strlen($round_code), "Test for generate expected length with round method");
    }
}
