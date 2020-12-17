<?php
namespace Advertising\services\pars;

trait BasePars
{
    /**
     * 设置点击链接参数信息
     * @param array|null $data
     */
    public function setDevicePars(?array $data = [])
    {
        foreach ($data as $k => $v) {
            if (isset($this->devicePars[$k])) {
                $this->devicePars[$k] = $v;
            }
        }
        return $this;
    }

    /**
     * 获取点击链接
     * @return string
     */
    public function getClickLink()
    {
        $pars = array_merge($this->devicePars, $this->DIYPars);
        $url  = $this->host . $this->clickApi;
        $url  .= stripos($this->host . $this->clickApi, '?') !== false ? '&' : '?' . http_build_query($pars);
        return $url;
    }


    /**
     * 设置自定义参数
     * @param array|null $DIYPars
     */
    public function setDIYPars(?array $DIYPars = [])
    {
        $this->DIYPars = $DIYPars;
        return $this;
    }

}