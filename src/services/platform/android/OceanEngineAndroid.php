<?php


namespace Advertising\services\platform\android;

use Advertising\services\platform\android\validate\OceanEngineAndroidValidate;
use Advertising\services\platform\basic\BaseOceanEngine;

/**
 * 巨量引擎安卓
 */
class OceanEngineAndroid extends BaseOceanEngine
{
    use OceanEngineAndroidValidate;

    /**
     * 巨量参数信息
     * @var string[]
     */
    public $devicePars = [
        "imei" => "__IMEI__",                    //安卓的设备 ID 的 md5 摘要，32位
        "mac" => "__MAC__",                      //移动设备mac地址,转换成大写字母,去掉“:”，并且取md5摘要后的结果
        "oaid" => "__OAID__",                    //Android Q及更高版本的设备号
        "oaid_md5" => "__OAID_MD5__",            //Android Q及更高版本的设备号的md5摘要，32位
        "androidid" => "__ANDROIDID__",          //安卓id原值的md5，32位
        "os" => "__OS__",                        //操作系统平台	安卓：0 IOS：1 其他：3
        "callback_param" => "__CALLBACK_PARAM__",//一些跟广告信息相关的回调参数，内容是一个加密字符串，在调用事件回传接口的时候会用到
        "aid" => "__AID__",                      //广告计划id
        "aid_name" => "__AID_NAME__",            //广告计划名称
        "advertiser_id" => "__ADVERTISER_ID__",  //广告主id
        "cid" => "__CID__",                      //广告创意 id，长整型
        "cid_name" => "__CID_NAME__",            //广告创意名称
        "campaign_id" => "__CAMPAIGN_ID__",      //广告组 id
        "campaign_name" => "__CAMPAIGN_NAME__",  //广告组名称
        "model" => "__MODEL__",                  //手机型号
        "ua" => "__UA__",                        //用户代理(User Agent)，一个特殊字符串头，使得服务器能够识别客户使用的操作系统及版本、CPU类型、浏览器及版本、浏览器渲染引擎、浏览器语言、浏览器插件等。
        "ip" => "__IP__"                         //媒体投放系统获取的用户终端的公共IP地址
    ];
}