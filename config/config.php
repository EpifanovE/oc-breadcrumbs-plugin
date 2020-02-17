<?php

use EEV\Breadcrumbs\Classes\Item;
use EEV\Breadcrumbs\Classes\Path;

return [
    'paths' => [
        Path::make('#^uslugi$#', function (Path $path, $page) {
            $path->addItem(Item::make('Услуги'));
        }),
    ],
    'params' => [
        'home' => 'Главная',
    ],
];