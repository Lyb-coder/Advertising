<?php


namespace Advertising\services\platform\ios;


use Advertising\services\platform\basic\BaseKwaiAds;
use Advertising\services\platform\ios\validate\KwaiAdsIosValidate;

/**
 * 快手IOS
 */
class KwaiAdsIos extends BaseKwaiAds
{
    use KwaiAdsIosValidate;
    /**
     * 快手参数信息
     * @var string[]
     */
    public $devicePars = [
        "idfa" => "__IDFA2__",//iOS下的idfa计算MD5，规则为32位十六进制数字+4位连接符“-”的原文（比如：32ED3EE5-9968-4F25-A015-DE3CFF569568），再计算MD5，再转大写
        "mac" => "__MAC2__",//对 MAC 进行 MD5
        "os" => "__OS__",//操作系统 0:Android，1:iOS，3:其他
        "accountid" => "__ACCOUNTID__",//原值，广告账户ID
        "aid" => "__AID__",//广告组ID
        "did" => "__DID__",//广告计划ID
        "dname" => "__DNAME__",//广告计划名称
        "cid" => "__CID__",//广告创意ID
        "csite" => "__CSITE__",//广告投放场景 1-优选广告，2-信息流广告（旧投放场景，含上下滑大屏广告），3-视频播放页广告，6-上下滑大屏广告，7-信息流广告（不含上下滑大屏广告）
        "callback" => "__CALLBACK__",//回调信息，编码一次的URL，长度小于10k
        "ua" => "__UA__",//用户代理(User Agent)
        "ip" => "__IP__"//用户IP地址
    ];
}