<?php

/*
 * This file is part of the cblink/dispatch-meituan.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\HyperfGaode\Kernel;

use Cblink\HyperfGaode\Kernel\Exception\GaodeException;
use Cblink\HyperfGaode\Kernel\Traits\HasHttpRequest;

/**
 * Class BaseClient.
 */
class BaseClient
{
    use HasHttpRequest;

    /**
     * @var ServiceContainer
     */
    protected $app;

    protected $config;

    /**
     * BaseClient constructor.
     * @param ServiceContainer $app
     */
    public function __construct(ServiceContainer $app)
    {
        $this->app = $app;

        $this->config = $app->config;
    }

    protected function getBaseOptions()
    {
        $options = [
            'base_uri' => method_exists($this, 'getBaseUri') ? $this->getBaseUri() : '',
            'timeout' => method_exists($this, 'getTimeout') ? $this->getTimeout() : 10.0,
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        return $options;
    }

    /**
     * 发送请求
     *
     * @param $method
     * @param $uri
     * @param array $params
     *
     * @return mixed
     */
    public function sendRequest($method, $uri, $params = [])
    {
        $params['key'] = $this->config['key'];
        $params['sig'] = $this->getSign($params);

        $response = $this->$method($this->url($uri), $params, $this->getBaseOptions());

        if ($response['status'] != 1) {
            throw new GaodeException($response['info'], $response['status']);
        }
        return $response;
    }

    /**
     * url
     *
     * @param string $uri
     * @return string
     */
    protected function url($uri = ''): string
    {
        return rtrim($this->app->baseUrl(), '/') . '/' . ltrim($uri, '/');
    }

    public function getSign(&$params)
    {
        $secret = $this->config['secret'];

        ksort($params);
        $paramString = '';
        foreach ($params as $key => &$param) {
            $paramString .= sprintf('%s=%s&', $key, $param);
        }
        $paramString = rtrim($paramString, '&');
        return md5($paramString . $secret);
    }

}
