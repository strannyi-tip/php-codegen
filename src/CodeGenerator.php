<?php

namespace StrannyiTip\PhpCodegen;

use StrannyiTip\PhpCodegen\Generator\SimpleRandomGenerator;
use StrannyiTip\PhpCodegen\Interfaces\GeneratorToolInterface;
use StrannyiTip\PhpCodegen\Interfaces\RandomGeneratorInterface;
use StrannyiTip\PhpCodegen\Tool\FillCode;
use StrannyiTip\PhpCodegen\Tool\MirrorCode;
use StrannyiTip\PhpCodegen\Tool\RepeatCode;
use StrannyiTip\PhpCodegen\Tool\RoundCode;
use StrannyiTip\PhpCodegen\Tool\SwingCodeDown;
use StrannyiTip\PhpCodegen\Tool\SwingCodeRandom;
use StrannyiTip\PhpCodegen\Tool\SwingCodeUp;


/**
 * Number code generator.
 */
class CodeGenerator
{
    /**
     * Mirror method.
     */
    public const string MIRROR_METHOD = 'mirror';

    /**
     * Random method.
     */
    public const string RANDOM_METHOD = 'random';

    /**
     * Repeat method.
     */
    public const string REPEAT_METHOD = 'repeat';

    /**
     * Swing up method.
     */
    public const string SWING_UP_METHOD = 'swing_up';

    /**
     * Swing down method.
     */
    public const string SWING_DOWN_METHOD = 'swing_down';

    /**
     * Fill method.
     */
    public const string FILL_METHOD = 'fill';

    /**
     * Round method.
     */
    public const string ROUND_METHOD = 'round';

    /**
     * @var GeneratorToolInterface|null
     */
    public ?GeneratorToolInterface $tool = null;

    /**
     * Random generator.
     *
     * @var RandomGeneratorInterface
     */
    private RandomGeneratorInterface $generator;

    /**
     * Tools container.
     *
     * @var array
     */
    private array $tools = [
        self::MIRROR_METHOD => MirrorCode::class,
        self::REPEAT_METHOD => RepeatCode::class,
        self::SWING_UP_METHOD => SwingCodeUp::class,
        self::SWING_DOWN_METHOD => SwingCodeDown::class,
        self::FILL_METHOD => FillCode::class,
        self::ROUND_METHOD => RoundCode::class,
    ];

    /**
     * Select random tool class for generate.
     *
     * @return string
     */
    private function selectRandomTool(): string
    {
        return $this->tools[\array_rand($this->tools)];
    }

    /**
     * Check if generator has method.
     *
     * @param string $method Generator method
     *
     * @return bool
     */
    private function hasMethod(string $method): bool
    {
        return \array_key_exists($method, $this->tools);
    }

    /**
     * Select tool class name.
     *
     * @param string $method Generator method
     *
     * @return string
     */
    private function selectToolClass(string $method): string
    {
        return $this->hasMethod($method) ?
            self::RANDOM_METHOD === $method ? $this->selectRandomTool() : $this->tools[$method] :
            $this->selectRandomTool();
    }

    public function __construct()
    {
        $this->generator = new SimpleRandomGenerator();
    }

    /**
     * Set random generator.
     *
     * @param RandomGeneratorInterface $generator Random generator
     *
     * @return CodeGenerator
     */
    public function setRandomGenerator(RandomGeneratorInterface $generator): CodeGenerator
    {
        $this->generator = $generator;

        return $this;
    }

    /**
     * Generate code.
     *
     * @param int $length Code length
     * @param string $method Generating method
     *
     * @return string
     */
    public function generate(int $length, string $method = self::RANDOM_METHOD): string
    {
        $tool_class = $this->selectToolClass($method);
        /** @var GeneratorToolInterface $tool_instance */
        $tool_instance = new $tool_class;
        $tool_instance->setGenerator($this->generator);
        $this->tool = $tool_instance;

        return $tool_instance->generate($length);
    }

    /**
     * @return GeneratorToolInterface|null
     */
    public function getTool(): ?GeneratorToolInterface
    {
        return $this->tool;
    }
}
