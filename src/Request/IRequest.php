<?php

namespace Stevennight\FeishuCorpSdk\Request;

interface IRequest
{
    public function get();

    public function post();

    public function delete();

    public function put();

    public function patch();

    public function head();

    public function options();
}
