<?php

namespace Stevennight\FeishuCorpSdk\Enum\Attendance;

class AttendanceResultEnum
{
    /** @var string 无需打卡 */
    const NO_NEED_CHECK = 'NoNeedCheck';
    /** @var string 系统打卡 */
    const SYSTEM_CHECK = 'SystemCheck';
    /** @var string 正常 */
    const NORMAL = 'Normal';
    /** @var string 早退 */
    const EARLY = 'Early';
    /** @var string 迟到 */
    const LATE = 'Late';
    /** @var string 严重迟到 */
    const SERIOUS_LATE = 'SeriousLate';

    /** @var string 缺卡 */
    const LACK = 'Lack';
    /** @var string 待打卡 */
    const TODO = 'Todo';
}
