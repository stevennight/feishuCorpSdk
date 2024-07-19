<?php

namespace Stevennight\FeishuCorpSdk\Cache;

abstract class Cache
{
    public $client;

    public $prefix;

    public function __construct($client, $prefix = '')
    {
        $this->client = $client;
        $this->prefix = $prefix;
    }

    abstract public function get($key, $default = '');

    abstract public function set($key, $value, $ttl);
}
