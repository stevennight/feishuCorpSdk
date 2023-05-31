<?php

namespace Stevennight\FeishuCorpSdk\Request;

abstract class Request implements IRequest
{
    public $client;
    public $url = '';
    public $query = [];
    public $json = [];
    public $form = [];
    public $header = [];
    public $files = [];

    abstract public function get();

    abstract public function post();

    abstract public function delete();

    abstract public function put();

    abstract public function patch();

    abstract public function head();

    abstract public function options();
}
