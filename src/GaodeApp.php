<?php


namespace Cblink\HyperfGaode;


use Cblink\HyperfGaode\Kernel\ServiceContainer;

/**
 * Class GaodeApp
 *
 * @property Direction\Client $direction
 * @property GeoCode\Client $geocode
 *
 * @package Cblink\HyperfGaode
 */
class GaodeApp extends ServiceContainer
{
    /**
     * @var string
     */
    protected $base_url = 'https://restapi.amap.com';

    /**
     * {@inheritdoc}
     */
    protected function getCustomProviders(): array
    {
        return [
            Direction\ServiceProvider::class,
            GeoCode\ServiceProvider::class,
        ];
    }


}