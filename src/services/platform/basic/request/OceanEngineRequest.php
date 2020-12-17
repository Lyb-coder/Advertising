<?php

namespace Advertising\services\platform\basic\request;

trait OceanEngineRequest
{
    private $callbackUrl = 'https://ad.oceanengine.com/track/activate/';
    protected $params = [

    ];

    public function setEventType($event_type)
    {
        $this->params['event_type'] = $event_type;
        return $this;
    }

    /**
     * 设置回调参数
     * @param $input
     * @return $this
     */
    public function setCallbackParam(array $input)
    {
        isset($input['callback_param'])
            ?: $this->setError('缺少回调参数：callback_param');
        isset($input['os'])
            ?: $this->setError('缺少回调参数：os');

        $this->params['callback']  = $input['callback_param'];
        $this->params['os']        = $input['os'];
        $this->params['conv_time'] = time();
        return $this;
    }

    /**
     * 回调请求发送
     * @return array
     */
    public function send()
    {
        $info = self::get($this->callbackUrl, $this->params);
        return [
            'param' => $this->params,
            'result' => $info
        ];
    }

    /**
     * @param array $params
     */
    public function setParams(array $params)
    {
        $this->params = array_merge($this->params,$params);
        return $this;
    }
}