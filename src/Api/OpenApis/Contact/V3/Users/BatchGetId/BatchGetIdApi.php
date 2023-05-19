<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Contact\V3\Users\BatchGetId;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Enum\UserIdTypeEnum;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class BatchGetIdApi extends Api
{

    /**
     * 通过手机号或邮箱批量飞书相关ID数据
     *
     * @var string
     * @link https://open.feishu.cn/document/uAjLw4CM/ukTMukTMukTM/reference/contact-v3/user/batch_get_id
     */
    public $path = '/open-apis/contact/v3/users/batch_get_id';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;
    public $userIdType = UserIdTypeEnum::USER_ID_TYPE_USER_ID;  // 默认获取user_id
    public $emails = [];  // 批量邮箱，例：["zhangsan@z.com", "lisi@a.com"]
    public $mobiles = [];  //批量手机号，例：["13812345678", "13812345679"]


    public function getJson()
    {
        $json = [
            'emails' => $this->emails,
            'mobiles'   => $this->mobiles
        ];
        return $json;
    }

    public function getQuery()
    {
        return [
            'user_id_type' => $this->userIdType,
        ];
    }
}
