<?php

namespace Stevennight\FeishuCorpSdk;

use Stevennight\FeishuCorpSdk\Api\Api;
use Stevennight\FeishuCorpSdk\Api\OpenApis\Auth\V3\TenantAccessToken\Internal\TenantAccessTokenInternalApi;
use Stevennight\FeishuCorpSdk\Exception\ResponseBusinessException;
use Stevennight\FeishuCorpSdk\Request\Impl\GuzzleHttpRequest;
use Stevennight\FeishuCorpSdk\Request\Request;

class FeishuCropSdk
{
    public $baseUrl = 'https://open.feishu.cn';
    public $config = [];
    public $httpClient;

    public function __construct($config)
    {
        $this->config = $config;
        $this->httpClient = $config['httpClient'] ?? GuzzleHttpRequest::class;
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
        $httpClient        = new $this->httpClient();
        $httpClient->url   = $this->baseUrl . $api->getPath();
        $httpClient->query = $api->getQuery();
        $httpClient->form  = $api->getForm();
        $httpClient->json  = $api->getJson();
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
        $api            = new TenantAccessTokenInternalApi();
        $api->appId     = $this->config['appId'] ?? '';
        $api->appSecret = $this->config['appSecret'] ?? '';

        $response = $this->request($api);

        // todo::缓存

        return $response['tenant_access_token'] ?? '';
    }
}
