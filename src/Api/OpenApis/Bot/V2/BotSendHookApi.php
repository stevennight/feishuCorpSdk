<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Bot\V2;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

/**
 * 机器人消息发送
 */
class BotSendHookApi extends Api
{
    public $path = '/open-apis/bot/v2/hook/{token}';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = false;

    public $token = '';
    public $json = [];

    public function getPath()
    {
        // 将部分参数拼到路径中。
        $path = $this->path;
        return str_replace([
            '{token}',
        ], [
            $this->token,
        ], $path);
    }

    public function getJson()
    {
        return $this->json;
    }
}