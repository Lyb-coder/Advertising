<?php

namespace Advertising\services\platform\basic\request;

trait TencentAdvertisingRequest
{
    public $callbackUrl = '';
    /**
     * @eg  public $actions = [
     *         "actions" => [
     *             "outer_action_id" => "",// 选填，若上报可能有重复请填写该id，系统会根据该ID进行去重
     *             "action_time" => '',    //上报时间
     *             "user_id" => [
     *                 "hash_imei"=>"f9efca36a3c30e1cf28170d86ecbf5e9",
     *                 "hash_idfa"=>"f9efca36a3c30e1cf28170d86ecbf5e9",
     *                 "hash_android_id"=>"",
     *                 "oaid"=>"",
     *                 "hash_oaid"=>""
     *             ],
     *             "action_type"=>"ACTIVATE_APP", // 必填 行为类型
     *             "action_param"=>[
     *                 "value"=>123,// 选填，用作付费/下单金额等上报
     *                 "int_example"=>456,// 选填，int类型参数示例
     *                 "int_array_example"=>[
     *                     123,
     *                     456
     *                 ],// 选填，int类型数组示例
     *                 "string_example"=>"aaa",// 选填，string类型参数示例
     *                 "string_array_example"=>[
     *                     "aaa",
     *                     "bbb"
     *                 ]// 选填，string类型数组示例
     *             ]
     *         ]
     * @var array
     */
    public $actions = [

    ];

    /**
     * @param string $action_type
     * @return $this
     */
    public function setActionType(string $action_type)
    {
        $this->actions['action_type'] = $action_type;
        return $this;
    }

    /**
     * @param array $action_param
     * @return $this
     */
    public function setActionParam(array $action_param)
    {
        $this->actions['action_param'] = $action_param;
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

        $this->callbackUrl            = $input['callback'];
        $this->actions['user_id']     = $input['user_id'];
        $this->actions['action_time'] = time();
        if (isset($input['outer_action_id'])) {
            $this->actions['outer_action_id'] = $input['outer_action_id'];
        }
        if (isset($input['action_param'])) {
            $this->actions['action_param'] = $input['action_param'];
        }
        return $this;
    }

    /**
     * 回调请求发送
     */
    public function send()
    {
        $option = [
            'header' => [
                'Content-Type: application/json',
                'cache-control: no-cache'
            ]
        ];
        $action = [
            'actions' => [$this->actions]
        ];
        $info   = self::post($this->callbackUrl, json_encode($action), $option);
        return [
            'param' => $action,
            'result' => $info
        ];
    }

    /**
     * @param array $params
     */
    public function setParams(array $params)
    {
        $this->actions = array_merge($this->actions, $params);
        return $this;
    }
}