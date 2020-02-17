<?php

namespace EEV\Breadcrumbs\Classes;

class Items
{
    protected $items = [];

    public function add($label, $url = null) {
        $item = [
            'label' => $label,
        ];

        if (!empty($url)) {
            $item['url'] = $url;
        }

        $this->items[] = $item;
    }

    public function getAll() {
        return $this->items;
    }
}