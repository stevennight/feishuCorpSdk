<?php

namespace Stevennight\FeishuCorpSdk\Request\Impl;

use GuzzleHttp\Client;
use Stevennight\FeishuCorpSdk\Request\Request;

class GuzzleHttpRequest extends Request
{

    public function __construct() {
        $this->client = new Client();
    }

    public function get()
    {
        // TODO: Implement get() method.
    }

    public function post()
    {
        // TODO: Implement post() method.
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
}
