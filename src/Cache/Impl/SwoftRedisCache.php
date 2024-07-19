<?php

namespace Stevennight\FeishuCorpSdk\Cache\Impl;

use Stevennight\FeishuCorpSdk\Cache\Cache;
use Swoft\Redis\Pool;

class SwoftRedisCache extends Cache
{
    /**
     * @var Pool
     */
    public $client;

    public function get($key, $default = '')
    {
        $key = $this->getKey($key);

        $res = $this->client->get($key);

        if ($res === false) {
            return $default;
        }

        $resArr = json_decode($res, true);
        if ($resArr === false) {
            return $default;
        }

        $value = $resArr['value'];
        $ttl = $resArr['ttl'] ?? 0;
        if ($ttl < time()) {
            return $default;
        }

        return $value;
    }

    public function set($key, $value, $ttl)
    {
        $key = $this->getKey($key);

        $this->client->set($key, json_encode([
            'value' => $value,
            'ttl' => time() + $ttl
        ]));
    }

    protected function getKey($key): string
    {
        return $this->prefix . $key;
    }
}
