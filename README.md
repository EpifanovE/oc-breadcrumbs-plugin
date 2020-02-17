## Config
```PHP
'items' => [
    '/^about$/' => function ($matches, Items $items, $page) {
        $items->add('About');
    },
],
'params' => [
    'home' => 'Главная',
],
```