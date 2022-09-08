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
            'origin' => '111.940749,44.918119',
            'destination' => '111.950749,44.928119'
        ]);

        var_dump($response);
    }

}