<?php

namespace StrannyiTip\PhpCodegen\Interfaces;

/**
 * Tool configuration.
 */
interface ConfigurationInterface
{
    /**
     * Get field for key.
     *
     * @param string $key Key name
     * @param mixed $default Default value
     *
     * @return mixed
     */
    public function get(string $key, mixed $default = null): mixed;

    /**
     * Set field.
     *
     * @param string $key Key name
     * @param mixed $val Field value
     *
     * @return ConfigurationInterface
     */
    public function set(string $key, mixed $val): ConfigurationInterface;

    /**
     * Check for configuration has field.
     *
     * @param string $key Key name
     *
     * @return bool
     */
    public function has(string $key): bool;
}
