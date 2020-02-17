<?php

namespace EEV\Breadcrumbs\Classes;

class Items
{
    protected $items = [];

    public function add(Item $item) {
        $this->items[] = $item;
    }

    public function getAll() {
        return $this->items;
    }
}