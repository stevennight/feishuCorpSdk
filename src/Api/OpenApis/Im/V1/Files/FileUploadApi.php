<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Im\V1\Files;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

class FileUploadApi extends Api
{
    public $path = '/open-apis/im/v1/files';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;

    public $fileType;

    public $fileName;

    public $duration;

    public $file;

    public function getForm(): array
    {
        $data = [
            'file_type' => $this->fileType,
            'file_name' => $this->fileName,
        ];

        if ($this->duration !== null) {
            $data['duration'] = $this->duration;
        }

        return $data;
    }

    public function getFiles(): array
    {
        return [
            [
                'fieldName' => 'file',
                'filePath' => $this->file,
            ],
        ];
    }
}
