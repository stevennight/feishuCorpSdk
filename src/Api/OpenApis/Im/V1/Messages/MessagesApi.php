<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Im\V1\Messages;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class MessagesApi extends Api
{
    public $path = '/open-apis/im/v1/messages';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;
    public $receiveIdType;
    public $receiveId;
    /**
     * @var string
     * @link https://open.feishu.cn/document/uAjLw4CM/ukTMukTMukTM/im-v1/message/create_json
     */
    public $msgType;
    public $content;
    public $uuid;


    public function getJson()
    {
        $json = [
            'receive_id' => $this->receiveId,
            'msg_type'   => $this->msgType,
            'content'    => $this->content,
        ];
        if ($this->uuid) {
            $json['uuid'] = $this->uuid;
        }

        return $json;
    }

    public function getQuery()
    {
        return [
            'receive_id_type' => $this->receiveIdType,
        ];
    }
}
