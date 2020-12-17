<?php


namespace Advertising\services\platform\basic\request;


trait KwaiAdsRequest
{
    protected $callbackUrl = '';
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
        isset($input['callback'])
            ?: $this->setError('缺少回调参数：callback');
        $this->callbackUrl = $input['callback'];
        if (isset($input['purchase_amount'])) {
            $this->params['purchase_amount'] = $input['purchase_amount'];
        }
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
        $this->params = array_merge($this->params, $params);
        return $this;
    }

}