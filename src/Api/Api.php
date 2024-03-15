<?php

namespace Stevennight\FeishuCorpSdk\Api;

use Stevennight\FeishuCorpSdk\Exception\ResponseBusinessException;
use Stevennight\FeishuCorpSdk\Request\Request;

abstract class Api
{
    public $path;
    public $method;
    public $requestAccessToken = true;

    /**
     * 响应中业务返回异常（code != 0），是否抛出ResponseBusinessException异常
     *
     * @var bool
     */
    public $responseBusinessException = true;

    public function getPath()
    {
        return $this->path;
    }

    public function getQuery()
    {
        return [];
    }

    public function getJson()
    {
        return [];
    }

    public function getForm()
    {
        return [];
    }

    /**
     * 文件上传
     * 格式：
     *  [
     *      [
     *          'fieldName' => '文件上传字段名称',
     *          'filePath' => '文件路径',
     *      ],
     *  ]
     *
     * @return array
     * @author Guo Junxian
     * Date 2023/5/31
     */
    public function getFiles()
    {
        return [];
    }

    public function getHeader()
    {
        return [];
    }

    public function beforeRequestHandler(Request $request)
    {

    }

    public function afterRequestHandler($response)
    {
        $response['code'] = $response['code'] ?? null;
        if ($this->responseBusinessException && $response['code'] !== 0) {
            throw new ResponseBusinessException($response['msg'] ?? '未知异常', (int) $response['code']);
        }

        return $response;
    }
}
