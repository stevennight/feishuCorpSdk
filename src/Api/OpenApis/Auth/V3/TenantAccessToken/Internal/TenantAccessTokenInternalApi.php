<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Auth\V3\TenantAccessToken\Internal;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class TenantAccessTokenInternalApi extends Api
{
    public $path = '/open-apis/auth/v3/tenant_access_token/internal';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = false;
    public $appId = '';
    public $appSecret = '';

    public function getJson()
    {
        return [
            'app_id'     => $this->appId,
            'app_secret' => $this->appSecret,
        ];
    }
}
