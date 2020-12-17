<?php


namespace Advertising\services\platform\android\validate;


trait OceanEngineAndroidValidate
{
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
            if (in_array($k, ['imei', 'oaid', 'oaid_md5', 'mac']) && $$k == $v)
                die('success');
        }
        //imei验证
        if (isset($imei) && $imei == 0 && in_array($imei, ['', md5(''), md5(0)]))
            $input['imei'] = '';
        //oaid验证
        if (isset($oaid) && $oaid == 0 && in_array($oaid, ['', '00000000-0000-0000-0000-000000000000'])) {
            $input['oaid']     = '';
            $input['oaid_md5'] = '';
        }
        //mac地址格式匹配
        if (isset($mac)) {
            $input['mac'] = str_replace(':', '', $mac);
            $input['mac'] = strtoupper($mac);
            if (in_array($mac, ['020000000000', '02:00:00:00:00:00', ''])) {
                $input['mac'] = '';
            }
        }
        return $input;
    }
}