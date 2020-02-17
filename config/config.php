<?php

use EEV\Breadcrumbs\Classes\Items;

return [
    'items' => [
        '/^uslugi$/' => function ($matches, Items $items, $page) {
            $items->add('Услуги');
        },
    ],
    'params' => [
        'home' => 'Главная',
    ],
];