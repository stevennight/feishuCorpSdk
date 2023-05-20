<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Contact\V3\Users;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Enum\UserIdTypeEnum;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class UsersDeleteApi extends Api
{

    /**
     * 删除用户
     *
     * @var string
     * @link https://open.feishu.cn/document/uAjLw4CM/ukTMukTMukTM/reference/contact-v3/user/create
     */
    public $path = '/open-apis/contact/v3/users/';
    public $method = RequestMethod::REQUEST_METHOD_DELETE;
    public $requestAccessToken = true;
    // Query 参数
    public $userIdType = UserIdTypeEnum::USER_ID_TYPE_USER_ID;  // 默认获取user_id
    // 路径参数
    public $userId;  //用户的user_id
    // 请求体参数
    public $departmentChatAcceptorUserId;  // 部门群接收者
    public $externalChatAcceptorUserId;  // 外部群接收者
    public $docsAcceptorUserId;  // 文档接收者
    public $calendarAcceptorUserId;  // 日程接收者
    public $applicationAcceptorUserId;  // 应用接受者
    public $helpdeskAcceptorUserId;  // 服务台暂不支持转移，本参数无效。
    public $minutesAcceptorUserId;  // 妙记接收者
    public $surveyAcceptorUserId;  // 飞书问卷接收者
    public $emailAcceptor;  // 用户邮件资源处理方式

    // 路径追加userId参数
    public function getPath()
    {
        $this->path .= $this->userId;
        return $this->path;
    }

    public function getJson()
    {
        $json = [
            'department_chat_acceptor_user_id'  => $this->departmentChatAcceptorUserId,
            'external_chat_acceptor_user_id'    => $this->externalChatAcceptorUserId,
            'docs_acceptor_user_id'             => $this->docsAcceptorUserId,
            'calendar_acceptor_user_id'         => $this->calendarAcceptorUserId,
            'application_acceptor_user_id'      => $this->applicationAcceptorUserId,
            'helpdesk_acceptor_user_id'         => $this->helpdeskAcceptorUserId,
            'minutes_acceptor_user_id'          => $this->minutesAcceptorUserId,
            'survey_acceptor_user_id'           => $this->surveyAcceptorUserId,
            'email_acceptor'                    => $this->emailAcceptor
        ];
        return $json;
    }

    public function getQuery()
    {
        return [
            'user_id_type' => $this->userIdType
        ];
    }
}
