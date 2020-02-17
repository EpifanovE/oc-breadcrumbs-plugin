## Config
```PHP
return [
    'paths' => [
        Path::make('#^services#', function ($matches, Items $items, $page) {
            $items->add(Item::make('Services'));
        }),
    ],
    'params' => [
        'home' => 'Главная',
    ],
];
```