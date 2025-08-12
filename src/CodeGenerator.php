<?php

namespace StrannyiTip\PhpCodegen;

use StrannyiTip\PhpCodegen\Tool\FillCode;
use StrannyiTip\PhpCodegen\Tool\MirrorCode;
use StrannyiTip\PhpCodegen\Tool\RepeatCode;
use StrannyiTip\PhpCodegen\Tool\SimpleCode;
use StrannyiTip\PhpCodegen\Tool\SwingCodeDown;
use StrannyiTip\PhpCodegen\Tool\SwingCodeRandom;
use StrannyiTip\PhpCodegen\Tool\SwingCodeUp;


/**
 * Number code generator.
 */
class CodeGenerator
{
    /**
     * Simple method.
     */
    public const string SIMPLE_METHOD = 'simple';

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
     * Swing random method.
     */
    public const string SWING_RANDOM_METHOD = 'swing_random';

    /**
     * Fill method.
     */
    public const string FILL_METHOD = 'fill';

    /**
     * Tools container.
     *
     * @var array
     */
    private array $tools = [
        self::SIMPLE_METHOD => SimpleCode::class,
        self::MIRROR_METHOD => MirrorCode::class,
        self::REPEAT_METHOD => RepeatCode::class,
        self::SWING_UP_METHOD => SwingCodeUp::class,
        self::SWING_DOWN_METHOD => SwingCodeDown::class,
        self::SWING_RANDOM_METHOD => SwingCodeRandom::class,
        self::FILL_METHOD => FillCode::class,
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

    /**
     * Generate code.
     *
     * @param int $length Code length
     * @param string $method Generating method
     *
     * @return int
     */
    public function generate(int $length, string $method = self::RANDOM_METHOD): int
    {
        $tool_class = $this->selectToolClass($method);

        return (new $tool_class)->generate((new Configuration())->set('length', $length));
    }
}
