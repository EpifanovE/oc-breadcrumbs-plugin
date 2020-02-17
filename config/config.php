<?php

use EEV\Breadcrumbs\Classes\Item;
use EEV\Breadcrumbs\Classes\Items;
use EEV\Breadcrumbs\Classes\Path;

return [
    'paths' => [
        Path::make('#^uslugi$#', function ($matches, Items $items, $page) {
            $items->add(Item::make('Услуги'));
        }),
    ],
    'params' => [
        'home' => 'Главная',
    ],
];