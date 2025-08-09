<?php

namespace StrannyiTip\PhpCodegen;

use StrannyiTip\PhpCodegen\Interfaces\ConfigurationInterface;

class Configuration implements Interfaces\ConfigurationInterface
{

    /**
     * Container.
     *
     * @var array
     */
    private array $container = [];

    /**
     * @inheritDoc
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $this->container[$key] ?? $default;
    }

    /**
     * @inheritDoc
     */
    public function set(string $key, mixed $val): ConfigurationInterface
    {
        $this->container[$key] = $val;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function has(string $key): bool
    {
        return \array_key_exists($key, $this->container);
    }
}
