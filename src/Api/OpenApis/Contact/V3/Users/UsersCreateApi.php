<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Contact\V3\Users;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Enum\DepartmentIdTypeEnum;
use Stevennight\FeishuCorpSdk\Enum\UserIdTypeEnum;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class UsersCreateApi extends Api
{

    /**
     * 创建用户
     *
     * @var string
     * @link https://open.feishu.cn/document/uAjLw4CM/ukTMukTMukTM/reference/contact-v3/user/create
     */
    public $path = '/open-apis/contact/v3/users';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;
    // Query 参数
    public $userIdType = UserIdTypeEnum::USER_ID_TYPE_USER_ID;  // 用户ID类型
    public $departmentIdType = DepartmentIdTypeEnum::DEPARTMENT_ID_TYPE_DEPARTMENT_ID;  // 部门ID的类型
    public $clientToken;  // 幂等判断参数
    // 请求体参数
    public $userId;  //用户的user_id
    public $name;  // 用户名
    public $enName;  // 英文名
    public $nickname;  // 别名
    public $email;  // 邮箱
    public $mobile;  // 手机号
    public $mobileVisible;  //手机号码可见性
    public $gender;  // 性别
    public $avatarKey;  // 头像的文件Key
    public $departmentIds;  // 用户所属部门的ID列表
    public $leaderUserId;  // 用户的直接主管的用户ID
    public $city;  // 工作城市
    public $country;  // 国家或地区Code缩写
    public $workStation;  // 工位
    public $joinTime;  // 入职时间
    public $employeeNo;  // 工号
    public $employeeType;  // 员工类型
    public $orders;  // 用户排序信息
    public $customAttrs;  // 自定义字段
    public $enterpriseEmail;  // 企业邮箱
    public $jobTitle;  // 职务
    public $geo;  // 成员数据驻留地
    public $jobLevelId;  // 职级ID
    public $jobFamilyId;  // 序列ID
    public $subscriptionIds;  // 分配给用户的席位ID列表


    public function getJson()
    {
        $json = [
            'user_id'           => $this->userId,
            'name'              => $this->name,
            'en_name'           => $this->enName,
            'nickname'          => $this->nickname,
            'email'             => $this->email,
            'mobile'            => $this->mobile,
            'mobile_visible'    => $this->mobileVisible,
            'gender'            => $this->gender,
            'avatar_key'        => $this->avatarKey,
            'department_ids'    => $this->departmentIds,
            'leader_user_id'    => $this->leaderUserId,
            'city'              => $this->city,
            'country'           => $this->country,
            'work_station'      => $this->workStation,
            'join_time'         => $this->joinTime,
            'employee_no'       => $this->employeeNo,
            'employee_type'     => $this->employeeType,
            'orders'            => $this->orders,
            'custom_attrs'      => $this->customAttrs,
            'enterprise_email'  => $this->enterpriseEmail,
            'job_title'         => $this->jobTitle,
            'geo'               => $this->geo,
            'job_level_id'      => $this->jobLevelId,
            'job_family_id'     => $this->jobFamilyId,
            'subscription_ids'  => $this->subscriptionIds
        ];
        return $json;
    }

    public function getQuery()
    {
        return [
            'user_id_type' => $this->userIdType,
            'department_id_type' => $this->departmentIdType,
            'client_token' => $this->clientToken,
        ];
    }
}
