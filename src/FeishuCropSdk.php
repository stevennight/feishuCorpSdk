<?php

namespace Stevennight\FeishuCorpSdk;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Api\OpenApis\Auth\V3\TenantAccessToken\Internal\TenantAccessTokenInternalApi;
use Stevennight\FeishuCorpSdk\Cache\Cache;
use Stevennight\FeishuCorpSdk\Exception\ResponseBusinessException;
use Stevennight\FeishuCorpSdk\Request\Impl\GuzzleHttpRequest;
use Stevennight\FeishuCorpSdk\Request\Request;

class FeishuCropSdk
{
    public $baseUrl = 'https://open.feishu.cn';
    public $config = [];
    public $httpClient;

    public $cacheProxy;

    public $cacheConnection;

    /** @var null|Cache */
    public $cacheProxyObj;

    public function __construct($config)
    {
        $this->config      = $config;
        $this->httpClient  = $config['httpClient'] ?? GuzzleHttpRequest::class;
        $this->cacheProxy = $config['cacheClient'] ?? null;
        $this->cacheConnection    = $config['cacheObj'] ?? null;

        // 有传入缓存代理类和缓存连接，则实例化缓存代理类
        if ($this->cacheProxy && $this->cacheConnection) {
            $this->cacheProxyObj = new $this->cacheProxy($this->cacheConnection);
        }
    }

    /**
     * @param Api $api
     * @return array
     * @throws Exception\ResponseBusinessException
     * @author Guo Junxian
     * Date 2023/5/18
     */
    public function request(Api $api): array
    {
        $accessToken = '';
        if ($api->requestAccessToken) {
            $accessToken = $this->getAccessToken();
        }
        $headers = $api->getHeader();
        if ($accessToken) {
            $headers = array_merge($headers, [
                'Authorization' => 'Bearer ' . $accessToken
            ]);
        }

        /** @var Request $httpClient */
        $httpClient         = new $this->httpClient();
        $httpClient->url    = $this->baseUrl . $api->getPath();
        $httpClient->query  = $api->getQuery();
        $httpClient->form   = $api->getForm();
        $httpClient->json   = $api->getJson();
        $httpClient->files  = $api->getFiles();
        $httpClient->header = $headers;
        $api->beforeRequestHandler($httpClient);
        $res = $httpClient->{$api->method}();
        return $api->afterRequestHandler($res);
    }

    /**
     * 获取 AccessToken
     *
     * @return string
     * @throws ResponseBusinessException
     * @author Guo Junxian
     * Date 2023/5/18
     */
    public function getAccessToken(): string
    {
        $token = '';

        $api            = new TenantAccessTokenInternalApi();
        $api->appId     = $this->config['appId'] ?? '';
        $api->appSecret = $this->config['appSecret'] ?? '';

        // 从缓存拿
        $key = 'feishuCorpSdk:cache:accessToken:' . $api->appId;
        if ($this->cacheProxyObj) {
            $token = $this->cacheProxyObj->get($key);
        }

        if ($token) {
            return $token;
        }

        // 从飞书接口拿
        $response = $this->request($api);
        $token    = $response['tenant_access_token'] ?? '';

        // 如果token获取成功，则保存到缓存
        if ($token && $this->cacheProxyObj) {
            $expire = $response['expire'] ?? 0;
            $this->cacheProxyObj->set($key, $token, $expire - 300);
        }

        return $token;
    }
}
