<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Im\V1\Messages;

use Stevennight\FeishuCorpSdk\Enum\UserIdTypeEnum;

class MessageReceiveIdTypeEnum
{
    const RECEIVE_ID_TYPE_USER_ID = UserIdTypeEnum::USER_ID_TYPE_USER_ID;
    const RECEIVE_ID_TYPE_UNION_ID = UserIdTypeEnum::USER_ID_TYPE_UNION_ID;
    const RECEIVE_ID_TYPE_OPEN_ID = UserIdTypeEnum::USER_ID_TYPE_OPEN_ID;

    const RECEIVE_ID_TYPE_EMAIL = 'email';
    const RECEIVE_ID_TYPE_CHAT_ID = 'chat_id';
}
