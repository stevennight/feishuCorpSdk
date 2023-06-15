<?php

namespace Stevennight\FeishuCorpSdk\Request\Impl;

use Stevennight\FeishuCorpSdk\Exception\RequestException;
use Stevennight\FeishuCorpSdk\Request\Request;
use Swlib\Http\ContentType;
use Swlib\Http\Exception\ClientException;
use Swlib\Http\Exception\HttpExceptionMask;
use Swlib\Saber;

class SaberRequest extends Request
{
    public $usePool = true;
    public $timeout = 30;
    public $exceptionReport = HttpExceptionMask::E_NONE;
    public $retryNum = 0;
    public $retry = [];

    public function __construct()
    {
        $this->client = Saber::create([
            'use_pool'         => $this->usePool,
            'timeout'          => $this->timeout,
            'exception_report' => $this->exceptionReport,
            'retry_time'       => $this->retryNum,
            'retry'            => $this->retry,
        ]);
    }

    public function get()
    {
        $res = $this->client->get($this->generateQuery(), [
            'headers' => $this->header,
        ]);

        return $this->handleResponse($res);
    }

    public function post()
    {
        $data = $this->generatePostData();

        $res = $this->client->post($this->generateQuery(), $data['data'], $data['options']);

        return $this->handleResponse($res);
    }

    public function delete()
    {
        $data = $this->generatePostData();
        $options = $data['options'];
        $options['data'] = $data['data'];

        $res = $this->client->delete($this->generateQuery(), $options);

        return $this->handleResponse($res);
    }

    public function put()
    {
        $data = $this->generatePostData();

        $res = $this->client->put($this->generateQuery(), $data['data'], $data['options']);

        return $this->handleResponse($res);
    }

    public function patch()
    {
        $data = $this->generatePostData();

        $res = $this->client->patch($this->generateQuery(), $data['data'], $data['options']);

        return $this->handleResponse($res);
    }

    public function head()
    {
        $res = $this->client->head($this->generateQuery(), [
            'headers' => $this->header,
        ]);

        return $this->handleResponse($res);
    }

    public function options()
    {
        $res = $this->client->options($this->generateQuery(), [
            'headers' => $this->header,
        ]);

        return $this->handleResponse($res);
    }

    /**
     * 生成带query的url
     *
     * @return mixed|string
     * @author Guo Junxian
     * Date 2023/5/18
     */
    public function generateQuery()
    {
        if (!$this->query) {
            return $this->url;
        }

        return $this->url . '?' . http_build_query($this->query);
    }

    /**
     * 生成post请求数据
     *
     * @return array|mixed
     * @author Guo Junxian
     * Date 2023/5/18
     */
    public function generatePostData() {
        $options = [];

        $data = $this->form;
        if ($this->files) {
            // 文件优先于json
            foreach ($this->files as $file) {
                $options['files'][$file['fieldName']] = $file['filePath'];
            }
        } elseif ($this->json) {
            $data = $this->json;
            $this->header['Content-Type'] = ContentType::JSON;
        }

        if ($this->header) {
            $options['headers'] = $this->header;
        }

        return [
            'data' => $data,
            'options' => $options,
        ];
    }

    /**
     * 处理响应
     * @throws RequestException
     */
    public function handleResponse(Saber\Response $res) {
        if (!$res->getSuccess()) {
            if (
                !$res->getException() instanceof ClientException
            ) {
                throw new RequestException($res->getException()->getMessage());
            }
        }

        $body = $res->getBody()->getContents();
        $contentType = $res->getHeader('Content-Type')[0] ?? '';
        if (stripos($contentType, ContentType::JSON) !== false) {
            $body = json_decode($body, true);
        }
        return $body;
    }
}
