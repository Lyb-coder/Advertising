<?php


namespace Advertising\services\platform\basic;


use Advertising\services\BaseService;
use Advertising\services\platform\basic\interfaces\CallbackEvent;
use Advertising\services\platform\basic\request\TencentAdvertisingRequest;

class BaseTencentAdvertising extends BaseService implements CallbackEvent
{
    use TencentAdvertisingRequest;
    /**
     * 激活事件
     * 用户下载安装完毕应用之后，在联网环境下打开应用
     * @return mixed
     */
    public function activeCallback()
    {
        // TODO: Implement activeCallback() method.
        $this->setActionType('ACTIVATE_APP');
        return $this;
    }

    /**
     * 注册事件
     * 完成应用下载并且在联网环境打开应用后，完成个人账号/游戏角色注册信息提交
     * @return mixed
     */
    public function registerCallback()
    {
        // TODO: Implement registerCallback() method.
        $this->setActionType('REGISTER');
        return $this;
    }

    /**
     * 付费事件
     * 完成应用下载并且在联网环境打开应用后，应用内完成一笔付款
     * @return mixed
     */
    public function payCallback()
    {
        // TODO: Implement payCallback() method.
        $this->setActionType('PURCHASE');
        return $this;
    }

    /**
     * 表单事件
     * 完成表单填写并提交
     * @return mixed
     */
    public function formCallback()
    {
        // TODO: Implement formCallback() method.
        die('广点通没有表单事件回传');
    }

    /**
     * 在线咨询
     * 用户点击在线咨询按钮
     * @return mixed
     */
    public function OnlineConsultationCallback()
    {
        // TODO: Implement OnlineConsultationCallback() method.
        die('广点通没有在线咨询回传');
    }

    /**
     * 有效咨询
     * 用户在消息咨询页面内完成至少一句消息对话
     * @return mixed
     */
    public function EffectiveConsultationCallback()
    {
        // TODO: Implement EffectiveConsultationCallback() method.
        die('广点通没有有效咨询回传');
    }

    /**
     * 次留
     * 用户激活后次日联网环境下打开应用
     * @return mixed
     */
    public function retentionCallback()
    {
        // TODO: Implement retentionCallback() method.
        $this->setActionType('START_APP');
        $this->setActionParam([
            'length_of_stay' => 1
        ]);
        return $this;
    }

    /**
     * 关键行为
     * 用户在应用内发生的关键行为/行为集合，若是关键行为集合一般是有关联的行为路径。（举例：某直播类客户以注册+发送弹幕作为关键行为转化目标，电商用注册+收藏商品+加入购物车+下单等）
     * @return mixed
     */
    public function behaviorsCallback()
    {
        // TODO: Implement behaviorsCallback() method.
        die('广点通没有关键行为回传');
    }
}