<?php

namespace Stevennight\FeishuCorpSdk\Enum\Contact;

class EmployeeTypeEnum
{
    // 员工类型 （调用获取员工类型接口得到，如增加或禁用时，需要同步更新这里的员工类型）
    // https://open.feishu.cn/document/uAjLw4CM/ukTMukTMukTM/reference/contact-v3/employee_type_enum/list
    const EMPLOYEE_TYPE_ALL = [
        '正式员工' => 1,
        '劳务' => 4,
        '试用期' => 6,
        '实习期' => 7,
        '实习生' => 8,
        '兼职' => 9
    ];


}
