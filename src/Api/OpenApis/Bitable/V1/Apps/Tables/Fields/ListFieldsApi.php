<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Bitable\V1\Apps\Tables\Fields;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class ListFieldsApi extends Api
{
    public $path = '/open-apis/bitable/v1/apps/{app_token}/tables/{table_id}/fields';
    public $method = RequestMethod::REQUEST_METHOD_GET;
    public $requestAccessToken = true;

    public $app_token;

    public $table_id;

    public $view_id;

    public $text_field_as_array;

    public $page_token;

    public $page_size = 100;

    public function getPath()
    {
        // 将部分参数拼到路径中。
        $path = $this->path;
        return str_replace([
            '{app_token}',
            '{table_id}',
        ], [
            $this->app_token,
            $this->table_id,
        ], $path);
    }

    public function getQuery()
    {
        $data = [];
        if ($this->view_id) {
            $data['view_id'] = $this->view_id;
        }
        if ($this->text_field_as_array) {
            $data['text_field_as_array'] = $this->text_field_as_array;
        }
        if ($this->page_token) {
            $data['page_token'] = $this->page_token;
        }
        if ($this->page_size) {
            $data['page_size'] = $this->page_size;
        }

        return $data;
    }
}