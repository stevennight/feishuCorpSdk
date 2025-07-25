<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Bitable\V1\Apps\Tables\Records;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class SearchApi extends Api
{
    public $path = '/open-apis/bitable/v1/apps/{app_token}/tables/{table_id}/records/search';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;

    public $app_token = '';
    public $table_id = '';

    public $view_id = '';

    public $page_token = '';

    public $page_size = 20;

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
        if ($this->app_token) {
            $query['app_token'] = $this->app_token;
        }
        if ($this->page_size) {
            $query['page_size'] = $this->page_size;
        }
        if ($this->page_token) {
            $query['page_token'] = $this->page_token;
        }
        return $query;
    }

    public function getJson()
    {
        return [
            'view_id' => $this->view_id
        ];
    }
}
