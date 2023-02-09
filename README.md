<h1 align="center"> hyperf-gaode </h1>

<p align="center"> .</p>


## Installing

```shell
$ composer require cblink/hyperf-gaode -vvv
```

## Usage

TODO

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/cblink/hyperf-gaode/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/cblink/hyperf-gaode/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT

参数与返回值参考高德Api文档: https://lbs.amap.com/api/webservice/gettingstarted

## 使用

```php
use Cblink\HyperfGaode;

$config = [
    'key' => '',
    'secret' => '',
];

$gaodeApp = new GaodeApp($config);


```
## 一. 地理/逆地理编码

```php
$query = [
    'address' => '详细地址',
    'city' => '城市',
];
$result = $gaodeApp->geocode->geocode($query);
```

## 二. 路线规划2.0

```php
// 1. 驾车路线规划
$query = [
    'origin' => '',
    'destination' => '',
];

$gaodeApp->direction->driving($query);
// 2. 电动车路线规划

$gaodeApp->direction->electricBike($query);

// 3. 骑行路线规划
$gaodeApp->direction->bicycling($query);

// 4. 步行路线规划
$gaodeApp->direction->walking($query);
```