<?php

include '../vendor/autoload.php';

$topClient = new \Advertising\client\TopClient();

//$topClient = $topClient
//    ->BindService('OCEANENGINEANDROID')
//    ->setHost('http://www.baidu.com')
//    ->setShowApi('/api/show')
//    ->setClickApi('/api/click');
//echo "点击监测链接:\n";
//$topClient->setDIYPars(['test' => 1]);
//echo $topClient->getClickLink()."\n";
//echo "展示监测链接:\n";
//echo $topClient->getShowLink()."\n";

//监测参数判断
//巨量引擎安卓参数测试
//$param = [
//    'source' => 'OCEANENGINEANDROID',
//    "imei" => "0c2bd03c39f19845bf54ea0abafae70e",
//    "mac" => "df97bc5021e14256e141b2f036df5a3c",
//    "oaid" => "97e7ef3f-e5f2-d0b8-ccfc-f79bbeaf4841",
//    "oaid_md5" => "87f8274c36eb73fabcbf143a10eca6a4",
//    "androidid" => "873541edf36da9170af47d5b69e82193",
//    "callback_param" => "EJiw267wvfQCGKg74ZIPD89-vIATAMOAFCIjIwMTkxMTI3MTQxMTEzMDEwMDI2MDc3MjE1MTUwNTczNTBIAQ==",
//    "aid" => "1645988237525045",
//    "aid_name" => "广告计划名称",
//    "advertiser_id" => "1631857582073864",
//    "cid" => "1650703686054530",
//    "cid_name" => "广告创意名称",
//    "campaign_id" => "1651688272934434",
//    "campaign_name" => "广告组名称",
//    "model" => "SM-A750GN",
//    "ua" => "News 7.4.5 rv:7.4.5.23\(iPhone; iOS 12.4.1; zh_CN\)Cronet",
//    "ip" => "127.0.0.1"
//];
//
//$topClient = $topClient->BindService($param['source']);
//$param = $topClient->getService()
//    ->RequestValidate($param);
//
//print_r($param);

//巨量安卓激活回调
//$input = [
//    "os" => 1,
//    "callback_param" => "EJiw267wvfQCGKf74ZIPD89-vIATAMOAFCIjIwMTkxMTI3MTQxMTEzMDEwMDI2MDc3MjE1MTUwNTczNTBIAQ=="
//];
//$topClient = $topClient->BindService('OCEANENGINEANDROID');
//
//$topClient->getService()
//    ->setCallbackParam($input)
//    ->activeCallback()
//    ->send();

//快手安卓回调激活
//$input = [
//    "callback" => "http://ad.partner.gifshow.com/track/activate?callback=pquwg3ITiCWXGs2_BQTRA3IrHpHMYIr0E3O_UxqOEjHGVrNa5l5b4h6opE_EL_thgRgtvjANf8s1p_pEYtwFvpJJM8L31Ab6pUcOHCtNBg3dGi7Ez3jG4ViPf_Xv4rSvSid5bIsPRlK_M3UeneWoty3bGYvL2p_svFyVfQHQef01unYYbDDxlWS-zSP5rMBK2bMaML4vctF-321wvig2XZOU5wXB9TfwWV3EU"
//];
//$topClient = $topClient->BindService('KWAIADSANDROID');
//
//print_r($topClient->getService()
//    ->setCallbackParam($input)
//    ->activeCallback()
//    ->send());

//广点通激活回调
$input = [
    'callback' => 'http://tracking.e.qq.com/conv?cb=4bav3U2Hkp1PVJiBCGsiZg8r0ePBkdnd2h1zszw%3D&conv_id=159851',
    'user_id' => [
        "hash_imei"=>"d073f7bbe50dc3acf012fe28fa26f0f4",
        "hash_idfa"=>"",
        "hash_android_id"=>"",
        "oaid"=>"7ffbfee8-67fc-62a8-ee53-adffebfc963c",
        "hash_oaid"=>""
    ]
];
$topClient = $topClient->BindService('TENCENTADVERTISINGANDROID');
print_r($topClient->getService()
    ->setCallbackParam($input)
    ->activeCallback()
    ->send());


