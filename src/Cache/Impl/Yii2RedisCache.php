<?php

namespace Stevennight\FeishuCorpSdk\Cache\Impl;

use Stevennight\FeishuCorpSdk\Cache\Cache;
use yii\redis\Connection;

class Yii2RedisCache extends Cache
{
    /**
     * @var Connection
     */
    public $client;

    public function get($key, $default = '')
    {
        $res = $this->client->get($key);

        if (!$res) {
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
        $this->client->set($key, json_encode([
            'value' => $value,
            'ttl' => time() + $ttl
        ]));
    }
}
