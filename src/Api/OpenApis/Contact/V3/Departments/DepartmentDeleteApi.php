<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Contact\V3\Departments;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Enum\DepartmentIdTypeEnum;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class DepartmentDeleteApi extends Api
{

    /**
     * 删除部门
     *
     * @var string
     * @link https://open.feishu.cn/document/server-docs/contact-v3/department/delete
     */
    public $path = '/open-apis/contact/v3/departments/';
    public $method = RequestMethod::REQUEST_METHOD_DELETE;
    public $requestAccessToken = true;
    // Query 参数
    public $departmentIdType = DepartmentIdTypeEnum::DEPARTMENT_ID_TYPE_DEPARTMENT_ID;  // 默认部门ID的类型
    // 路径参数
    public $departmentId;  //部门ID


    // 路径追加userId参数
    public function getPath()
    {
        $this->path .= $this->departmentId;
        return $this->path;
    }

    public function getQuery()
    {
        return [
            'department_id_type' => $this->departmentIdType
        ];
    }
}
