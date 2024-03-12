<?php

namespace Stevennight\FeishuCorpSdk\Dto\Bitable;

class BitableRecordDto
{
    /** @var array 一行记录的字段与值 */
    public $fields = [];

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param mixed $fields
     */
    public function setFields($fields): void
    {
        $this->fields = $fields;
    }
}