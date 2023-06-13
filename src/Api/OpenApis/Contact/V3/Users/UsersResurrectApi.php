<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Contact\V3\Users;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Enum\DepartmentIdTypeEnum;
use Stevennight\FeishuCorpSdk\Enum\UserIdTypeEnum;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class UsersResurrectApi extends Api
{

    /**
     * 恢复已删除用户
     *
     * @var string
     * @link https://open.feishu.cn/document/server-docs/contact-v3/user/resurrect
     */
    public $path = '/open-apis/contact/v3/users/';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;
    // Query 参数
    public $userIdType = UserIdTypeEnum::USER_ID_TYPE_USER_ID;  // 用户ID类型
    public $departmentIdType = DepartmentIdTypeEnum::DEPARTMENT_ID_TYPE_DEPARTMENT_ID;  // 部门ID的类型
    // 路径参数
    public $userId;  //用户的user_id
    // 请求体参数
    public $departments;  // 部门-数组(含：department_id, user_order, department_order)
    public $subscriptionIds;  // 指定恢复后分配的席位-数组

    // 路径追加userId参数
    public function getPath()
    {
        $this->path .= $this->userId . '/resurrect';
        return $this->path;
    }

    public function getJson()
    {
        $arr = [
            'departments'              => $this->departments,
            'subscription_ids'         => $this->subscriptionIds,
        ];
        // 剔除空内容
        $json = [];
        foreach ($arr as $key => $value) {
            if (!empty($value)) {
                $json[$key] = $value;
            }
        }
        return $json;
    }

    public function getQuery()
    {
        return [
            'user_id_type' => $this->userIdType,
            'department_id_type' => $this->departmentIdType,
        ];
    }
}
