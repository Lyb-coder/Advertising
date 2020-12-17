<?php
/**
 * @author: lvyabin<mail@lvyabin.com>
 * @day: 2020/12/12
 */

namespace Advertising\client;

use Advertising\services\platform\android\OceanEngineAndroid;
use Advertising\services\platform\android\TencentAdvertisingAndroid;
use Advertising\services\platform\android\KwaiAdsAndroid;
use Advertising\services\platform\ios\OceanEngineIos;
use Advertising\services\platform\ios\TencentAdvertisingIos;
use Advertising\services\platform\ios\KwaiAdsIos;

/**
 * Class TopClient
 * @package client
 */
class TopClient
{
    /**
     * @var string
     */
    protected $host = 'https://www.badiu.com/test';
    /**
     * @var string
     */
    protected $click_api = '/api/click';
    /**
     * @var string
     */
    protected $show_api = '/api/show';

    /**
     * @var array
     */
    protected $devicePars = [

    ];
    protected $DIYPars = [

    ];
    protected $config = [
        //安卓巨量引擎
        'OCEANENGINEANDROID' => OceanEngineAndroid::class,
        //IOS巨量引擎
        'OCEANENGINEIOS' => OceanEngineIos::class,

        //安卓广点通
        'TENCENTADVERTISINGANDROID' => TencentAdvertisingAndroid::class,
        //IOS广点通
        'TENCENTADVERTISINGIOS' => TencentAdvertisingIos::class,

        //安卓快手
        'KWAIADSANDROID' => KwaiAdsAndroid::class,
        //IOS快手
        'KWAIADSIOS' => KwaiAdsIos::class,

    ];
    /**
     * @var KwaiAdsAndroid|OceanEngineAndroid|TencentAdvertisingAndroid|KwaiAdsIos|OceanEngineIos|TencentAdvertisingIos|mixed
     */
    protected $service;

    /**
     * 绑定一个服务
     * @param string $source
     * @return TopClient
     * @throws \Exception
     */
    public function BindService(string $source = ''):TopClient
    {

        if (!isset($this->config[$source])) {
            throw new \Exception('source non-existent');
        }
        if (!$source) {
            throw new \Exception('source is not null');
        }
        $this->service = new $this->config[$source];

        $this->devicePars = $this->service->getDevicePars();

        $this->setDIYPars(['source' => $source]);

        return $this;
    }

    /**
     * @param string $host
     * @return TopClient
     */
    public function setHost(string $host): TopClient
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @param string $click_api
     * @return TopClient
     */
    public function setClickApi(string $click_api): TopClient
    {
        $this->click_api = $click_api;
        return $this;
    }

    /**
     * @param string $show_api
     * @return TopClient
     */
    public function setShowApi(string $show_api): TopClient
    {
        $this->show_api = $show_api;
        return $this;
    }
    /**
     * 获取点击链接
     * @return string
     */
    public function getClickLink()
    {
        $pars = array_merge($this->devicePars, $this->DIYPars);
        $url  = $this->host . $this->click_api;
        $url  .= stripos($this->host . $this->click_api, '?') !== false ? '&' : '?' . http_build_query($pars);
        return $url;
    }
    /**
     * 获取展示链接
     * @return string
     */
    public function getShowLink():string
    {
        $pars = array_merge($this->devicePars, $this->DIYPars);
        $url  = $this->host . $this->show_api;
        $url  .= stripos($this->host . $this->show_api, '?') !== false ? '&' : '?' . http_build_query($pars);
        return $url;
    }

    /**
     * @param array $DIYPars
     * @return TopClient
     */
    public function setDIYPars(array $DIYPars):TopClient
    {
        $this->DIYPars = array_merge($this->DIYPars,$DIYPars);
        return $this;
    }

    /**
     * @param array $devicePars
     * @return TopClient
     */
    public function setDevicePars(array $devicePars):TopClient
    {
        $this->devicePars = array_merge($this->devicePars,$devicePars);
        return $this;
    }

    /**
     * @return KwaiAdsAndroid|OceanEngineAndroid|TencentAdvertisingAndroid|KwaiAdsIos|OceanEngineIos|TencentAdvertisingIos|mixed
     */
    public function getService()
    {
        return $this->service;
    }
}