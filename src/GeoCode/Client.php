<?php

/*
 * This file is part of the cblink/dispatch-meituan.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\HyperfGaode\GeoCode;

use Cblink\HyperfGaode\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * 地理/逆地理编码
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfGaode\Kernel\Exception\GaodeException
     */
    public function geocode(array $params)
    {
        return $this->sendRequest('get', 'v3/geocode/geo', $params);
    }

}
