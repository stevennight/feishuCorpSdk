<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Bitable\V1\Apps;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class CreateTableApi extends Api
{
    public $path = '/open-apis/bitable/v1/apps/{app_token}/tables';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;

    public $app_token = '';

    public $name;

    public $default_view_name;

    public $fields = [];

    public function getPath()
    {
        // 将部分参数拼到路径中。
        $path = $this->path;
        return str_replace([
            '{app_token}',
        ], [
            $this->app_token,
        ], $path);
    }

    public function getJson()
    {
        $data = [
            'table' => [
                'name' => $this->name,
            ],
        ];

        if ($this->default_view_name) {
            $data['table']['default_view_name'] = $this->default_view_name;
        }

        if ($this->fields) {
            $data['table']['fields'] = $this->fields;
        }

        return $data;
    }
}