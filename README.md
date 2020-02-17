## Config
```PHP
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
```