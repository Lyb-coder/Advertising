<?php


namespace Advertising\services\platform\android;


use Advertising\services\platform\android\validate\KwaiAdsAndroidValidate;
use Advertising\services\platform\basic\BaseKwaiAds;

/**
 * 快手安卓
 */
class KwaiAdsAndroid extends BaseKwaiAds
{
    use KwaiAdsAndroidValidate;

    /**
     * 快手参数信息
     * @var string[]
     */
    public $devicePars = [
        "imei" => "__IMEI2__",          //对15位数字的 IMEI （比如860576038225452）进行 MD5（备注：安卓广告唯一标示，imei双卡手机可能有两个，取默认的一个）
        "mac" => "__MAC2__",            //对 MAC 进行 MD5
        "oaid" => "__OAID__",           //Android设备标识，原值，新增字段，预计2019年12月前覆盖80%以上Android Q版本快手用户
        "androidid" => "__ANDROIDID2__",//对 ANDROIDID（举例:8f6581815307be28） 进行 MD5
        "os" => "__OS__",               //操作系统 0:Android，1:iOS，3:其他
        "accountid" => "__ACCOUNTID__", //原值，广告账户ID
        "aid" => "__AID__",             //广告组ID
        "did" => "__DID__",             //广告计划ID
        "dname" => "__DNAME__",         //广告计划名称
        "cid" => "__CID__",             //广告创意ID
        "csite" => "__CSITE__",         //广告投放场景 1-优选广告，2-信息流广告（旧投放场景，含上下滑大屏广告），3-视频播放页广告，6-上下滑大屏广告，7-信息流广告（不含上下滑大屏广告）
        "callback" => "__CALLBACK__",   //回调信息，编码一次的URL，长度小于10k
        "ua" => "__UA__",               //用户代理(User Agent)
        "ip" => "__IP__"                //用户IP地址
    ];
}