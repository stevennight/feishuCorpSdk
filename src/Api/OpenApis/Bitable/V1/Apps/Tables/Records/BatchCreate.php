<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Bitable\V1\Apps\Tables\Records;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class BatchCreate extends Api
{
    public $path = '/open-apis/bitable/v1/apps/{app_token}/tables/{table_id}/records/batch_create';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;

    public $app_token = '';
    public $table_id = '';
    /**
     * @var array{
     *     fields: array
     * }
     */
    public $records = [];

    public $user_id_type;
    public $client_token;

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

    public function getQuery()
    {
        $query = [];
        if ($this->user_id_type) {
            $query['user_id_type'] = $this->user_id_type;
        }
        if ($this->client_token) {
            $query['client_token'] = $this->client_token;
        }
        return $query;
    }

    public function getJson()
    {
        return [
            'records' => $this->records
        ];
    }
}