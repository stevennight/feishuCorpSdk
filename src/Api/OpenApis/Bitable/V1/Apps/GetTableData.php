<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Bitable\V1\Apps;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class GetTableData extends Api
{
    public $path = '/open-apis/bitable/v1/apps/{app_token}';
    public $method = RequestMethod::REQUEST_METHOD_GET;
    public $requestAccessToken = true;

    public $app_token = '';

    public function getPath()
    {
        // 将部分参数拼到路径中。
        $path = $this->path;
        return str_replace([
            '{app_token}',
        ], [
            $this->app_token,
        ], $path);
    }

}
