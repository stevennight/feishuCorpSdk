<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\DocumentAi\V1\VatInvoice;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Request\RequestMethod;

/**
 * 增值税发票识别Api
 */
class VatInvoiceRecognizeApi extends Api
{
    public $path = '/open-apis/document_ai/v1/vat_invoice/recognize';
    public $method = RequestMethod::REQUEST_METHOD_POST;
    public $requestAccessToken = true;

    public $file;

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