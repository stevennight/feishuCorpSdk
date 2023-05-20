<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Attendance\V1\UserTasks\Query;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Enum\EmployeeTypeEnum;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

/**
 * 打卡结果批量获取接口
 *
 * class AttendanceUserTasks
 *
 * @author Guo Junxian
 * Date 2023/05/20 17:09:11
 */
class AttendanceUserTasks extends Api
{
    public $path = '/open-apis/attendance/v1/user_tasks/query';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;

    // Query字段
    /** @var string 员工工号类型 */
    public $employeeType = EmployeeTypeEnum::EMPLOYEE_TYPE_EMPLOYEE_ID;
    /** @var bool 是否忽略无效和没有权限的用户 */
    public $ignoreInvalidUsers = true;
    /** @var bool 是否包括离职员工 */
    public $includeTerminatedUser = true;

    // Json字段
    /** @var array 用户ID集合 */
    public $userIds;
    /** @var string 开始时间 Ymd */
    public $checkDateFrom;
    /** @var string 结束时间 Ymd */
    public $checkDateTo;


    public function getJson()
    {
        return [
            'user_ids' => $this->userIds,
            'check_date_from'   => $this->checkDateFrom,
            'check_date_to'    => $this->checkDateTo,
        ];
    }

    public function getQuery()
    {
        return [
            'employee_type' => $this->employeeType,
            'ignore_invalid_users' => $this->ignoreInvalidUsers,
            'include_terminated_user' => $this->includeTerminatedUser,
        ];
    }
}
