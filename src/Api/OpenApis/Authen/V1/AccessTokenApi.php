<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Authen\V1;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

/**
 * 获取 user_access_token（网页应用）
 *
 * https://open.feishu.cn/document/server-docs/authentication-management/access-token/create-2
 *
 * AccessTokenApi
 *
 * @author Guo Junxian
 * @date 2023/8/30
 */
class AccessTokenApi extends Api
{
    public $path = '/open-apis/authen/v1/access_token';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;
    public $grantType = 'authorization_code';
    public $code = '';

    public function getJson()
    {
        $json = [
            'grant_type' => $this->grantType,
            'code' => $this->code,
        ];
        return $json;
    }
}