<?php

namespace EEV\Breadcrumbs\Classes;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;

class Breadcrumbs
{
    protected $config;

    protected $items;

    protected $paths;

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

        if (!empty($this->config['paths'])) {
            $this->runCurrentCallback();
        } else {
            $this->defaultCallback();
        }

        return array_merge($result, $this->items->getAll());
    }

    protected function getRootItem()
    {
        if ($this->config['params']['home']) {
            return Item::make($this->config['params']['home'], Url::to('/'));
        }
        return null;
    }

    protected function runCurrentCallback()
    {
        $uri = Request::path();

        foreach ($this->config['paths'] as $path) {
            /**
             * @var Path $path
             */
            if (preg_match($path->getExpression(), $uri, $matches)) {
                $path->getCallback()($matches, $this->items, $this->page);
                break;
            }
            $this->defaultCallback();
        }
    }

    protected function defaultCallback()
    {
        $this->items->add(Item::make($this->page->title));
    }
}