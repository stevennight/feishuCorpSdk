<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Message\V4\BatchSend;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class MessageBatchSendApi extends Api
{
    public $path = '/open-apis/message/v4/batch_send/';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;
    /**
     * @var string
     * @link https://open.feishu.cn/document/uAjLw4CM/ukTMukTMukTM/im-v1/message/create_json
     */
    public $msgType;

    /**
     * 该参数仅在 msg_type 取值为 text、image、post 或者 share_chat 时需要传入值。如果 msg_type 取值为 interactive，则消息内容需要传入到 card 参数。
     * @var
     */
    public $content;
    public $card;
    public $departmentIds;
    public $openIds;
    public $userIds;
    public $unionIds;


    public function getJson()
    {
        $json = [
            'msg_type'   => $this->msgType,
        ];

        if (!empty($this->content)) {
            $json['content'] = $this->content;
        }

        if (!empty($this->card)) {
            $json['card'] = $this->card;
        }

        if (!empty($this->departmentIds)) {
            $json['department_ids'] = $this->departmentIds;
        }

        if (!empty($this->openIds)) {
            $json['open_ids'] = $this->openIds;
        }

        if (!empty($this->userIds)) {
            $json['user_ids'] = $this->userIds;
        }

        if (!empty($this->unionIds)) {
            $json['union_ids'] = $this->unionIds;
        }

        return $json;
    }
}
