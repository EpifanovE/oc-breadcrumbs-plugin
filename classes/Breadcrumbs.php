<?php

namespace EEV\Breadcrumbs\Classes;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;

class Breadcrumbs
{
    protected $config;

    protected $items;

    protected $page;

    public function __construct($config, $page)
    {
        $this->config = $config;
        $this->items = new Items();
        $this->page = $page;
    }

    public function getItems()
    {
        $result = [];

        if ($root = $this->getRootItem()) {
            $result[] = $root;
        }

        if (!empty($this->config['items'])) {
            $this->runCurrentCallback();
        } else {
            $this->defaultCallback();
        }

        return array_merge($result, $this->items->getAll());
    }

    protected function getRootItem()
    {
        if ($this->config['params']['home']) {
            return [
                'label' => $this->config['params']['home'],
                'url' => Url::to('/'),
            ];
        }
        return null;
    }

    protected function runCurrentCallback()
    {
        $path = Request::path();

        foreach ($this->config['items'] as $expression => $function) {
            if (preg_match($expression, $path, $matches)) {
                $function($matches, $this->items, $this->page);
                break;
            }
            $this->defaultCallback();
        }
    }

    protected function defaultCallback() {
        $this->items->add($this->page->title);
    }
}