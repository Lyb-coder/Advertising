<?php


namespace Advertising\services\platform\ios;

use Advertising\services\platform\basic\BaseTencentAdvertising;
use Advertising\services\platform\ios\validate\TencentAdvertisingIosValidate;

class TencentAdvertisingIos extends BaseTencentAdvertising
{
    use TencentAdvertisingIosValidate;
    /**
     * 广点通参数信息
     * @var string[]
     */
    public $devicePars = [
        'click_id' => '__CLICK_ID__',                //点击id
        "click_time" => "__CLICK_TIME__",            //点击时间
        "campaign_id" => "__CAMPAIGN_ID__",          //计划id
        "adgroup_id" => "__ADGROUP_ID__",            //广告组id
        "ad_id" => "__AD_ID__",                      //广告id
        "ad_platform_type" => "__AD_PLATFORM_TYPE__",//广告投放平台
        "account_id" => "__ACCOUNT_ID__",            //广告主id
        "agency_id" => "__AGENCY_ID__",              //代理商id
        "device_os_type" => "__DEVICE_OS_TYPE__",    //设备类型	ios, android
        "process_time" => "__PROCESS_TIME__",        //请求时间
        "muid" => "__MUID__",                        //设备id（imei或idfa的加密值）
        "ip" => "__IP__",                            //媒体投放系统获取的用户终端的公共IPV4地址
        "user_agent" => "__USER_AGENT__",            //用户代理（user_agent）
        "callback" => "__CALLBACK__",                //直接提供上报信息回传接口的 url，url encode编码，广告主可以直接使用
    ];
}