<?php

namespace Stevennight\FeishuCorpSdk\Cache;

abstract class Cache
{
    public $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    abstract public function get($key, $default = '');

    abstract public function set($key, $value, $ttl);
}
