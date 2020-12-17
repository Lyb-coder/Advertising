<?php


namespace Advertising\services;


use Advertising\services\pars\BasePars;
use Advertising\traits\Http;

abstract class BaseService
{
    use Http;
    use BasePars;

    /**
     * 接口地址
     * @var string
     */
    public $host = '';
    /**
     * 自定义参数
     * @var array
     */
    public $DIYPars = [];
    /**
     * 点击链接
     * @var string
     */
    public $clickApi = '';
    /**
     * 广告平台参数信息
     * @var string[]
     */
    public $devicePars = [];

    /**
     * 错误信息
     * @var array
     */
    public $Error = [];

    /**
     * @return string[]
     */
    public function getDevicePars(): array
    {
        return $this->devicePars;
    }

    /**
     * @return array
     */
    public function getError(): array
    {
        return $this->Error;
    }

    /**
     * @param array|string $Error
     */
    public function setError($Error): void
    {
        if (is_array($Error)){
            $this->Error = array_merge($this->Error,$Error);
        }elseif(is_string($Error)){
            die($Error);
        }
    }
}