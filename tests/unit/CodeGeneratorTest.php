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
    }

    public function testFillCode()
    {
        $fill_code = $this->generator->generate(4, CodeGenerator::FILL_METHOD);
        $this->tester->assertEquals(4, \strlen($fill_code), "Test for generate expected length with fill method");
        $number_simple = $this->generator->generate(4, CodeGenerator::FILL_METHOD);
        $this->tester->assertEquals(7777, $number_simple, 'FillCode generate test simple');
        $number_complex = $this->generator->generate(5, CodeGenerator::FILL_METHOD);
        $this->tester->assertEquals(77777, $number_complex, 'FillCode generate test complex');
    }

    public function testMirrorCode()
    {
        $number_simple = $this->generator->generate(6, CodeGenerator::MIRROR_METHOD);
        $number_complex = $this->generator->generate(5, CodeGenerator::MIRROR_METHOD);
        $this->tester->assertEquals(6, \strlen($number_simple), "Test for generate expected length with mirror simple");
        $this->tester->assertEquals(5, \strlen($number_complex), "Test for generate expected length with mirror complex");
        $number_match = $this->generator->generate(5, CodeGenerator::MIRROR_METHOD);
        $this->tester->assertEquals(54745, $number_match, 'MirrorCode generate test');
    }

    public function testRepeatCode()
    {
        $number_simple = $this->generator->generate(6, CodeGenerator::REPEAT_METHOD);
        $number_complex = $this->generator->generate(5, CodeGenerator::REPEAT_METHOD);
        $this->tester->assertEquals(6, \strlen($number_simple), "Test for generate expected length with repeat simple");
        $this->tester->assertEquals(5, \strlen($number_complex), "Test for generate expected length with repeat complex");
        $number_match = $this->generator->generate(6, CodeGenerator::REPEAT_METHOD);
        $this->tester->assertEquals(545454, $number_match, 'RepeatCode generate test');
    }

    public function testRoundCode()
    {
        $round_code = $this->generator->generate(6, CodeGenerator::ROUND_METHOD);
        $this->tester->assertEquals(6, \strlen($round_code), "Test for generate expected length with round method");
        $number = $this->generator->generate(4, CodeGenerator::FILL_METHOD);
        $this->tester->assertEquals(7777, $number, 'RoundCode generate test');
    }

    public function testSwingDownCode()
    {
        $swing_code_down = $this->generator->generate(6, CodeGenerator::SWING_DOWN_METHOD);
        $this->tester->assertEquals(6, \strlen($swing_code_down), "Test for generate expected length with swing_down method");
        $number_simple = $this->generator->generate(4, CodeGenerator::SWING_DOWN_METHOD);
        $this->tester->assertEquals(5453, $number_simple, 'SwingCodeDown generate test simple');
        $number_complex = $this->generator->generate(5, CodeGenerator::SWING_DOWN_METHOD);
        $this->tester->assertEquals(54753, $number_complex, 'SwingCodeDown generate test complex');
    }

    public function testSwingUpCode()
    {
        $swing_code_up = $this->generator->generate(6, CodeGenerator::SWING_UP_METHOD);
        $this->tester->assertEquals(6, \strlen($swing_code_up), "Test for generate expected length with swing_up method");
        $number_simple = $this->generator->generate(4, CodeGenerator::SWING_UP_METHOD);
        $this->tester->assertEquals(5455, $number_simple, 'SwingCodeUp generate test simple');
        $number_complex = $this->generator->generate(5, CodeGenerator::SWING_UP_METHOD);
        $this->tester->assertEquals(54755, $number_complex, 'SwingCodeUp generate test complex');
    }
}
