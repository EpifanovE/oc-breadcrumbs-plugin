<?php

namespace EEV\Breadcrumbs\Components;

use Cms\Classes\CodeBase;
use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;

class Breadcrumbs extends ComponentBase
{
    /**
     * @var \EEV\Breadcrumbs\Classes\Breadcrumbs
     */
    protected $breadcrumbsManager;

    public function __construct(CodeBase $cmsObject = null, $properties = [])
    {
        parent::__construct($cmsObject, $properties);
    }

    public function componentDetails()
    {
        return [
            'name' => 'eev.breadcrumbs::lang.components.breadcrumbs.name',
            'description' => 'eev.breadcrumbs::lang.components.breadcrumbs.desc'
        ];
    }

    public function getItems()
    {
        return $this->breadcrumbsManager->getItems();
    }

    public function onRun()
    {
        $config['items'] = Config::get('eev.breadcrumbs::items');
        $config['params'] = Config::get('eev.breadcrumbs::params');
        $this->breadcrumbsManager = new \EEV\Breadcrumbs\Classes\Breadcrumbs($config, $this->page);
    }

}