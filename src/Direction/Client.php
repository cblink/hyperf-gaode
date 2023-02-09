<?php

/*
 * This file is part of the cblink/dispatch-meituan.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\HyperfGaode\Direction;

use Cblink\HyperfGaode\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * 驾车
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfGaode\Kernel\Exception\GaodeException
     */
    public function driving(array $params)
    {
        return $this->sendRequest('get', 'v5/direction/driving', $params);
    }

    /**
     * 电动车
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfGaode\Kernel\Exception\GaodeException
     */
    public function electricBike(array $params)
    {
        return $this->sendRequest('get', 'v5/direction/electrobike', $params);
    }

    /**
     * 骑行
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfGaode\Kernel\Exception\GaodeException
     */
    public function bicycling(array $params)
    {
        return $this->sendRequest('get', 'v5/direction/bicycling', $params);
    }

    /**
     * 步行
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfGaode\Kernel\Exception\GaodeException
     */
    public function walking(array $params)
    {
        return $this->sendRequest('get', 'v5/direction/walking', $params);
    }

    /**
     * 公交路线规划
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfGaode\Kernel\Exception\GaodeException
     */
    public function integrated(array $params)
    {
        return $this->sendRequest('get', 'v5/direction/integrated', $params);
    }
}
