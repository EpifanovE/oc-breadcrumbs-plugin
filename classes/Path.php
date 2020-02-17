<?php

namespace EEV\Breadcrumbs\Classes;

class Path
{
    protected $expression;

    protected $callback;

    public function __construct($expression, $callback)
    {
        $this->expression = $expression;
        $this->callback = $callback;
    }

    public static function make($expression, $callback) {
        return new self($expression, $callback);
    }

    public function getExpression() {
        return $this->expression;
    }

    public function getCallback() {
        return $this->callback;
    }

}