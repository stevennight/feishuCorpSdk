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
            $res = $this->client->post($this->url, [
                'query'       => $this->query,
                'json'        => $this->json,
                'form_params' => $this->form,
                'headers'     => $this->header,
            ]);
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
            $res = $this->client->delete($this->url, [
                'query'       => $this->query,
                'json'        => $this->json,
                'form_params' => $this->form,
                'headers'     => $this->header,
            ]);
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
            $res = $this->client->put($this->url, [
                'query'       => $this->query,
                'json'        => $this->json,
                'form_params' => $this->form,
                'headers'     => $this->header,
            ]);
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
            $res = $this->client->patch($this->url, [
                'query'       => $this->query,
                'json'        => $this->json,
                'form_params' => $this->form,
                'headers'     => $this->header,
            ]);
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
            $res = $this->client->head($this->url, [
                'query'       => $this->query,
                'json'        => $this->json,
                'form_params' => $this->form,
                'headers'     => $this->header,
            ]);
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
            $res = $this->client->options($this->url, [
                'query'       => $this->query,
                'json'        => $this->json,
                'form_params' => $this->form,
                'headers'     => $this->header,
            ]);
        } catch (ClientException $exception) {
            $res = $exception->getResponse();
        } catch (Exception $exception) {
            throw new RequestException($exception->getMessage());
        }

        return $this->handleResponse($res);
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
