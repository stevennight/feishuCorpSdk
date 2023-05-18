<?php

namespace Stevennight\FeishuCorpSdk\Request\Impl;

use Stevennight\FeishuCorpSdk\Exception\RequestException;
use Stevennight\FeishuCorpSdk\Request\Request;
use Swlib\Http\ContentType;
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
        $res = $this->client->get($this->generateQuery($this->url, $this->query), [
            'headers' => $this->header,
        ]);

        return $this->handleResponse($res);
    }

    public function post()
    {
        $data = $this->form;
        if ($this->json) {
            $data = $this->json;
        }

        $res = $this->client->post($this->generateQuery($this->url, $this->query), $data, [
            'headers' => $this->header,
        ]);

        return $this->handleResponse($res);
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function put()
    {
        // TODO: Implement put() method.
    }

    public function patch()
    {
        // TODO: Implement patch() method.
    }

    public function head()
    {
        // TODO: Implement head() method.
    }

    public function options()
    {
        // TODO: Implement options() method.
    }

    public function generateQuery($url, $query)
    {
        if (!$query) {
            return $url;
        }

        return $url . '?' . http_build_query($query);
    }

    /**
     * @throws RequestException
     */
    public function handleResponse($res) {
        if (!$res->getSuccess()) {
            throw new RequestException($res->exception);
        }

        $body = $res->getBody()->getContents();
        if ($res->getHeader('Content-Type') === ContentType::JSON) {
            $body = json_decode($body, true);
        }
        return $body;
    }
}
