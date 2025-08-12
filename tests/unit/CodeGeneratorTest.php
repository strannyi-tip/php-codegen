<?php

namespace unit;

use Codeception\Test\Unit;
use StrannyiTip\PhpCodegen\CodeGenerator;
use StrannyiTip\PhpCodegen\Generator\TestRandomGenerator;
use UnitTester;

class CodeGeneratorTest extends Unit
{
    protected UnitTester $tester;

    protected CodeGenerator $generator;

    protected function _before(): void
    {
        $this->generator = new CodeGenerator();
        $this->generator->setRandomGenerator(new TestRandomGenerator());
    }
    public function testGenerateLengths()
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
        $swing_code_up = $this->generator->generate(6, CodeGenerator::SWING_UP_METHOD);
        $this->tester->assertEquals(6, \strlen($swing_code_up), "Test for generate expected length with swing_up method");
        $swing_code_down = $this->generator->generate(6, CodeGenerator::SWING_DOWN_METHOD);
        $this->tester->assertEquals(6, \strlen($swing_code_down), "Test for generate expected length with swing_down method");
    }

    public function testFillCode()
    {
        $number = $this->generator->generate(4, CodeGenerator::FILL_METHOD);
        $this->tester->assertEquals(7777, $number, 'FillCode generate test');
    }

    public function testMirrorCode()
    {
        $number = $this->generator->generate(5, CodeGenerator::MIRROR_METHOD);
        $this->tester->assertEquals(54745, $number, 'MirrorCode generate test');
    }

    public function testRepeatCode()
    {
        $number = $this->generator->generate(6, CodeGenerator::REPEAT_METHOD);
        $this->tester->assertEquals(545454, $number, 'RepeatCode generate test');
    }

    public function testRoundCode()
    {
        $number = $this->generator->generate(4, CodeGenerator::FILL_METHOD);
        $this->tester->assertEquals(7777, $number, 'RoundCode generate test');
    }

    public function testSwingDownCode()
    {
        $number = $this->generator->generate(4, CodeGenerator::SWING_DOWN_METHOD);
        $this->tester->assertEquals(5453, $number, 'SwingCodeDown generate test');
    }

    public function testSwingUpCode()
    {
        $number = $this->generator->generate(4, CodeGenerator::SWING_UP_METHOD);
        $this->tester->assertEquals(5455, $number, 'SwingCodeUp generate test');
    }
}
