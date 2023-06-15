<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Tenant\V2\Tenant;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class TenantAssignInfoListQueryApi extends Api
{

    /**
     * 获取企业席位信息接口
     *
     * @var string
     * @link https://open.feishu.cn/document/server-docs/tenant-v2/tenant-product_assign_info/query
     */
    public $path = '/open-apis/tenant/v2/tenant/assign_info_list/query';
    public $method = RequestMethod::REQUEST_METHOD_GET;
    public $requestAccessToken = true;

}
