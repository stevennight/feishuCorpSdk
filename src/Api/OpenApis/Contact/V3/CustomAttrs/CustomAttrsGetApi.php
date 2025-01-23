<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Contact\V3\CustomAttrs;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class CustomAttrsGetApi extends Api
{

    /**
     * 获取企业自定义用户字段
     *
     * @var string
     * @link https://open.feishu.cn/document/server-docs/contact-v3/custom_attr/list
     */
    public $path = '/open-apis/contact/v3/custom_attrs';
    public $method = RequestMethod::REQUEST_METHOD_GET;
    public $requestAccessToken = true;
    // Query 参数
    public $pageSize = 20;  // 分页大小
    public $pageToken;  // 分页标记

    public function getQuery()
    {
        return [
            'page_size' => $this->pageSize,
            'page_token' => $this->pageToken
        ];
    }
}
