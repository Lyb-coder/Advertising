<?php


namespace Advertising\services\platform\android\validate;

/**
 * 广点通安卓
 */
trait TencentAdvertisingAndroidValidate{
    /**
     * 请求参数验证
     * @param $input
     * @return mixed
     */
    public function RequestValidate($input)
    {
        extract($input);
        foreach ($this->devicePars as $k => $v) {
            if (!isset($$k))
                $this->setError('缺少参数:' . $k);
            if (in_array($k, ['muid', 'oaid', 'hash_oaid']) && $$k == $v)
                die('success');
        }
        //muid验证
        if (isset($muid) && $muid == 0 && in_array($muid, ['', md5(''), md5(0)]))
            $input['muid'] = '';
        //oaid验证
        if (isset($oaid) && $oaid == 0 && in_array($oaid, ['', '00000000-0000-0000-0000-000000000000'])) {
            $input['oaid']     = '';
        }

        return $input;
    }
}