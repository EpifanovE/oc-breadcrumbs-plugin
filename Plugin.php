<?php

namespace EEV\Breadcrumbs;

use EEV\Breadcrumbs\Components\Breadcrumbs;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public $require = ['EEV.Core'];

    public function registerComponents()
    {
        return [
            Breadcrumbs::class => 'breadcrumbs',
        ];
    }

}