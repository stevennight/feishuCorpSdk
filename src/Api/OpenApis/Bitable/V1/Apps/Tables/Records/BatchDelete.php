<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Bitable\V1\Apps\Tables\Records;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class BatchDelete extends Api
{
    public $path = '/open-apis/bitable/v1/apps/{app_token}/tables/{table_id}/records/batch_delete';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;

    public $app_token = '';
    public $table_id = '';
    /**
     * @var string[]
     */
    public $records = [];

    public function getPath()
    {
        // 将部分参数拼到路径中。
        $path = $this->path;
        return str_replace([
            '{app_token}',
            '{table_id}'
        ], [
            $this->app_token,
            $this->table_id
        ], $path);
    }

    public function getJson()
    {
        return [
            'records' => $this->records
        ];
    }
}