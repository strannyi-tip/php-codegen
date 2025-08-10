<?php

namespace StrannyiTip\PhpCodegen;

use StrannyiTip\PhpCodegen\Interfaces\ConfigurationInterface;
use StrannyiTip\PhpCodegen\Interfaces\GeneratorToolInterface;
use StrannyiTip\PhpCodegen\Tool\MirrorCode;
use StrannyiTip\PhpCodegen\Tool\RepeatCode;
use StrannyiTip\PhpCodegen\Tool\SimpleCode;

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
     * Tools container.
     *
     * @var array
     */
    private array $tools = [
        self::SIMPLE_METHOD => SimpleCode::class,
        self::MIRROR_METHOD => MirrorCode::class,
        self::REPEAT_METHOD => RepeatCode::class,
    ];

    /**
     * Tool configuration.
     *
     * @var ConfigurationInterface
     */
    private ConfigurationInterface $config;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->config = new Configuration();
    }

    /**
     * Select random tool for generate.
     *
     * @return GeneratorToolInterface one
     */
    private function selectRandomTool(): GeneratorToolInterface
    {
        $tool_class = $this->tools[\array_rand($this->tools)];

        return new $tool_class;
    }

    /**
     * Configuration referrer.
     *
     * @return ConfigurationInterface
     */
    public function configuration(): ConfigurationInterface
    {
        return $this->config;
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
        $this->config->set('length', $length);

        $tool_class = match ($method) {
            self::SIMPLE_METHOD => $this->tools[self::SIMPLE_METHOD],
            self::MIRROR_METHOD => $this->tools[self::MIRROR_METHOD],
            self::REPEAT_METHOD => $this->tools[self::REPEAT_METHOD],
            default => $this->selectRandomTool(),
        };

        $result = (new $tool_class)->generate($this->config);
        if (\strlen($result) < $length) {
            $result .= (new $tool_class)->generate((new Configuration())->set('length', $length - \strlen($result)));
        }
        if (\strlen($result) > $length) {
            $result = \substr($result, 0, $length);
        }

        return $result;
    }
}
