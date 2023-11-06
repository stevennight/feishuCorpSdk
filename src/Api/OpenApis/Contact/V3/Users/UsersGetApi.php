<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Contact\V3\Users;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Enum\DepartmentIdTypeEnum;
use Stevennight\FeishuCorpSdk\Enum\UserIdTypeEnum;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class UsersGetApi extends Api
{

    /**
     * 获取单个用户信息
     *
     * @var string
     * @link https://open.feishu.cn/document/server-docs/contact-v3/user/get
     */
    public $path = '/open-apis/contact/v3/users/';
    public $method = RequestMethod::REQUEST_METHOD_GET;
    public $requestAccessToken = true;
    // Query 参数
    public $userIdType = UserIdTypeEnum::USER_ID_TYPE_USER_ID;  // 用户ID类型
    public $departmentIdType = DepartmentIdTypeEnum::DEPARTMENT_ID_TYPE_DEPARTMENT_ID;  // 部门ID的类型
    // 路径参数
    public $userId;  //用户的user_id

    // 路径追加userId参数
    public function getPath()
    {
        $this->path .= $this->userId;
        return $this->path;
    }

    public function getQuery()
    {
        return [
            'user_id_type' => $this->userIdType,
            'department_id_type' => $this->departmentIdType
        ];
    }
}
