<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Mina\V2\TokenLoginValidate;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class TokenLoginValidateApi extends Api
{
    public $path = '/open-apis/mina/v2/tokenLoginValidate';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;

    /**
     *
     * 用户登录（code获取用户信息）
     *
     * @var string
     * @link https://open.feishu.cn/document/uYjL24iN/ukjM04SOyQjL5IDN
     */
    public $code;

    public function getJson()
    {
        $json = [
            'code' => $this->code,
        ];
        return $json;
    }

}
