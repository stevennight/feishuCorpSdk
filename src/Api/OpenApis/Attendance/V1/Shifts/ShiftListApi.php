<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Attendance\V1\Shifts;

use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class ShiftListApi
{
    public $path = '/open-apis/attendance/v1/user_tasks/query';
    public $method = RequestMethod::REQUEST_METHOD_GET;
    public $requestAccessToken = true;

    public $pageSize = 50;

    public $pageToken;

    public function getQuery()
    {
        $data = [
            'page_size' => $this->pageSize,
        ];
        if ($this->pageToken) {
            $data['page_token'] = $this->pageToken;
        }

        return $data;
    }
}
