<?php

namespace StrannyiTip\PhpCodegen;

use StrannyiTip\PhpCodegen\Interfaces\ConfigurationInterface;
use StrannyiTip\PhpCodegen\Interfaces\GeneratorToolInterface;
use StrannyiTip\PhpCodegen\Tool\SimpleCode;

/**
 * Number code generator.
 */
class CodeGenerator
{
    /**
     * Tools container.
     *
     * @var array
     */
    private array $tools = [
        SimpleCode::class,
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
     *
     * @return int
     */
    public function generate(int $length): int
    {
        $this->config->set('length', $length);

        return $this->selectRandomTool()->generate($this->config);
    }
}
