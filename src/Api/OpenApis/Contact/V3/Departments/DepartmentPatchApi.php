<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Contact\V3\Departments;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Enum\DepartmentIdTypeEnum;
use Stevennight\FeishuCorpSdk\Enum\UserIdTypeEnum;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class DepartmentPatchApi extends Api
{

    /**
     * 修改部门部分信息
     *
     * @var string
     * @link https://open.feishu.cn/document/server-docs/contact-v3/department/patch
     */
    public $path = '/open-apis/contact/v3/departments/';
    public $method = RequestMethod::REQUEST_METHOD_PATCH;
    public $requestAccessToken = true;
    // Query 参数
    public $userIdType = UserIdTypeEnum::USER_ID_TYPE_USER_ID;  // 用户ID类型
    public $departmentIdType = DepartmentIdTypeEnum::DEPARTMENT_ID_TYPE_DEPARTMENT_ID;  // 部门ID的类型
    // 路径参数
    public $departmentId;  //部门ID
    // 请求体参数
    public $name;  // 部门名称
    public $i18nName;  // 国际化的部门名称-数组(含：zh_cn, ja_jp, en_us)
    public $parentDepartmentId;  // 父部门的ID
    public $leaderUserId;  // 部门主管用户ID
    public $order;  // 部门的排序，即部门在其同级部门的展示顺序
    public $unitIds;  // 部门单位自定义ID列表，当前只支持一个
    public $createGroupChat;  // 是否创建部门群
    public $leaders;  // 部门负责人-数组(含：leaderType, leaderID)
    public $groupChatEmployeeTypes;  // 部门群雇员类型限制
    public $departmentHrbps;  // 部门HRBP

    // 路径追加userId参数
    public function getPath()
    {
        $this->path .= $this->departmentId;
        return $this->path;
    }

    public function getJson()
    {
        $arr = [
            'name'                      => $this->name,
            'i18n_name'                 => $this->i18nName,
            'parent_department_id'      => $this->parentDepartmentId,
            'leader_user_id'            => $this->leaderUserId,
            'order'                     => $this->order,
            'unit_ids'                  => $this->unitIds,
            'create_group_chat'         => $this->createGroupChat,
            'leaders'                   => $this->leaders,
            'group_chat_employee_types' => $this->groupChatEmployeeTypes,
            'department_hrbps'          => $this->departmentHrbps
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
