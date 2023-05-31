<?php

namespace Stevennight\FeishuCorpSdk\Request\Impl;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;
use Stevennight\FeishuCorpSdk\Exception\RequestException;
use Stevennight\FeishuCorpSdk\Request\Request;

class GuzzleHttpRequest extends Request
{

    public function __construct()
    {
        $this->client = new Client();
    }

    public function get()
    {
        try {
            $res = $this->client->get($this->url, [
                'query'   => $this->query,
                'headers' => $this->header,
            ]);
        } catch (ClientException $exception) {
            $res = $exception->getResponse();
        } catch (Exception $exception) {
            // todo::这里没办法用原来的exception定位文件、line、trace等。
            throw new RequestException($exception->getMessage());
        }

        return $this->handleResponse($res);
    }

    public function post()
    {
        try {
            $data = $this->generateOptions();
            $res = $this->client->post($this->url, $data);
        } catch (ClientException $exception) {
            $res = $exception->getResponse();
        } catch (Exception $exception) {
            throw new RequestException($exception->getMessage());
        }

        return $this->handleResponse($res);
    }

    public function delete()
    {
        try {
            $data = $this->generateOptions();
            $res = $this->client->delete($this->url, $data);
        } catch (ClientException $exception) {
            $res = $exception->getResponse();
        } catch (Exception $exception) {
            throw new RequestException($exception->getMessage());
        }

        return $this->handleResponse($res);
    }

    public function put()
    {
        try {
            $data = $this->generateOptions();
            $res = $this->client->put($this->url, $data);
        } catch (ClientException $exception) {
            $res = $exception->getResponse();
        } catch (Exception $exception) {
            throw new RequestException($exception->getMessage());
        }

        return $this->handleResponse($res);
    }

    public function patch()
    {
        try {
            $data = $this->generateOptions();
            $res = $this->client->patch($this->url, $data);
        } catch (ClientException $exception) {
            $res = $exception->getResponse();
        } catch (Exception $exception) {
            throw new RequestException($exception->getMessage());
        }

        return $this->handleResponse($res);
    }

    public function head()
    {
        try {
            $data = $this->generateOptions();
            $res = $this->client->head($this->url, $data);
        } catch (ClientException $exception) {
            $res = $exception->getResponse();
        } catch (Exception $exception) {
            throw new RequestException($exception->getMessage());
        }

        return $this->handleResponse($res);
    }

    public function options()
    {
        // todo::不知道是否可用
        try {
            $data = $this->generateOptions();
            $res = $this->client->options($this->url, $data);
        } catch (ClientException $exception) {
            $res = $exception->getResponse();
        } catch (Exception $exception) {
            throw new RequestException($exception->getMessage());
        }

        return $this->handleResponse($res);
    }

    public function generateOptions(): array
    {
        $data = [
            'query'       => $this->query,
            'headers'     => $this->header,
        ];

        if ($this->files) {
            $data['multipart'] = [];
            foreach ($this->form as $fieldName => $value) {
                $data['multipart'][] = [
                    'name' => $fieldName,
                    'contents' => $value,
                ];
            }
            foreach ($this->files as $value) {
                $data['multipart'][] = [
                    'name'     => $value['fieldName'],
                    'contents' => fopen($value['filePath'], 'rb')
                ];
            }
        } else {
            $data['json'] = $this->json;
            $data['form_params'] = $this->form;
        }

        return $data;
    }

    /**
     * 处理响应
     * @throws RequestException
     */
    public function handleResponse(ResponseInterface $res)
    {
        $body        = $res->getBody()->getContents();
        $contentType = $res->getHeader('Content-Type')[0] ?? '';
        if (stripos($contentType, 'application/json') !== false) {
            $body = json_decode($body, true);
        }
        return $body;
    }
}
