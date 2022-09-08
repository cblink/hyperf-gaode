<?php

/*
 * This file is part of the cblink/dispatch-meituan.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\HyperfGaode\Kernel;

use Pimple\Container;


/**
 * Class ServiceContainer
 * @package Cblink\HyperfGaode\Kernel
 */
abstract class ServiceContainer extends Container
{
    /**
     * @var array
     */
    public $config;

    /**
     * ServiceContainer constructor.
     *
     * @param array $config
     * @param array $values
     */
    public function __construct(array $config, array $values = [])
    {
        parent::__construct($values);
        $this->setConfig($config);
        $this->registerProviders($this->getProviders());
    }

    public function setConfig(array $config = [])
    {
        $this->config = $config;
    }

    /**
     * @param $key
     * @param null $default
     *
     * @return mixed
     */
    public function config($key, $default = null)
    {
        return $this->config[$key] ?? $default;
    }

    /**
     * @return string
     */
    public function baseUrl()
    {
        return $this->base_url;
    }

    protected function registerProviders(array $providers)
    {
        foreach ($providers as $provider) {
            parent::register(new $provider());
        }
    }

    protected function getProviders(): array
    {
        return $this->getCustomProviders();
    }

    abstract protected function getCustomProviders(): array;

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->offsetGet($name);
    }
}
