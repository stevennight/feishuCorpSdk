<?php

namespace Stevennight\FeishuCorpSdk\Service;

use Stevennight\FeishuCorpSdk\Api\OpenApis\Jssdk\Ticket\JssdkTicketGetApi;
use Stevennight\FeishuCorpSdk\Exception\Jssdk\JssdkTicketGetFailException;
use Stevennight\FeishuCorpSdk\FeishuCropSdk;

/**
 * 获取Jssdk配置
 *
 * JssdkConfigService
 *
 * @author Guo Junxian
 * @date 2023/8/29
 */
class JssdkConfigService
{
    public $sdk;

    public $appId;

    public $ticketCacheKey = 'feishuCorpSdk:cache:ticketCache:';

    public $ticket;

    public function __construct(FeishuCropSdk $sdk)
    {
        $this->sdk = $sdk;
        $this->appId = $sdk->config['appId'];
    }

    /**
     * 获取配置
     *
     * @param $url
     * @return array
     * @throws JssdkTicketGetFailException
     */
    public function getConfig($url)
    {
        $this->getTicket();

        $timestamp = time() * 1000;
        // 随机字符串
        $noncestr = md5($timestamp . mt_rand(1000, 9999) . 'feishuCorpSdk');

        $verifyStr =  sprintf(
            'jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s',
            $this->ticket, $noncestr, $timestamp, $url
        );
        $signature = sha1($verifyStr);

        $config = [
            "appid" => $this->appId,
            "signature" => $signature,
            "noncestr" => $noncestr,
            "timestamp" => $timestamp
        ];

        return $config;
    }

    /**
     * 获取ticket
     *
     * @return void
     * @throws JssdkTicketGetFailException
     * @throws \Stevennight\FeishuCorpSdk\Exception\ResponseBusinessException
     */
    public function getTicket()
    {
        // 读缓存
        $this->ticket = $this->sdk->cacheProxyObj->get($this->getTicketCacheKey());

        if (!$this->ticket) {
            // 从飞书接口获取
            $api = new JssdkTicketGetApi();
            $response = $this->sdk->request($api);
            $this->ticket = $response['data']['ticket'] ?? null;

            // 设置缓存
            if ($this->ticket) {
                $this->sdk->cacheProxyObj->set($this->getTicketCacheKey(), $response['data']['ticket'], $response['data']['expire_in']);
            }
        }

        // 没有ticket，提示报错。
        if (!$this->ticket) {
            throw new JssdkTicketGetFailException('获取ticket失败');
        }
    }

    /**
     * ticket 缓存键
     *
     * @return string
     */
    public function getTicketCacheKey(): string
    {
        return $this->ticketCacheKey . $this->appId;
    }
}