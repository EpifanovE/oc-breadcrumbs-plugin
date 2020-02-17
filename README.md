## Config
```PHP
use EEV\Breadcrumbs\Classes\Item;
use EEV\Breadcrumbs\Classes\Path;

return [
    'paths' => [
        Path::make('#^services#', function (Path $path, $page) {
            $path->addItem(Item::make('Services'));
        }),
    ],
    'params' => [
        'home' => 'Home',
    ],
];
```