<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Jssdk\Ticket;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

/**
 * JSAPI 临时授权凭证获取
 *
 * JssdkTicketGetApi
 *
 * https://open.feishu.cn/document/ukTMukTMukTM/uYTM5UjL2ETO14iNxkTN/h5_js_sdk/authorization
 *
 * @author Guo Junxian
 * @date 2023/8/29
 */
class JssdkTicketGetApi extends Api
{
    public $path = '/open-apis/jssdk/ticket/get';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;
}