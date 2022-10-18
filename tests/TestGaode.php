<?php


use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class TestGaode extends TestCase
{
    protected $app;

    protected function setUp(): void
    {
        parent::setUp();

        $app = $this->app = new \Cblink\HyperfGaode\GaodeApp([
            'key' => 'test',
            'secret' => 'test'
        ]);
    }

    public function testOrderCheck()
    {
        $lat = '44.918119';
        $lng = '111.940749';
        $response = $this->app->direction->electricBike([
            'origin' => '113.942658,22.540748',
            'destination' => '113.948371,22.535699'
        ]);
        var_dump($response);
    }

    public function testGeoCode()
    {
        $lat = '44.918119';
        $lng = '111.940749';
        $response = $this->app->geocode->geocode([
            'address' => '北京市朝阳区阜通东大街6号',
            'city' => '北京市'
        ]);
        var_dump($response['geocodes'][0]['location']);
    }

}