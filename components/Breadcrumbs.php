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

    public function defineProperties()
    {
        return [
            'adv_class' => [
                'title' => 'eev.forms::lang.adv_class',
                'description' => '',
                'default' => '',
                'type' => 'string',
                'showExternalParam' => false,
                'group' => 'eev.forms::lang.params',
            ],
        ];
    }

    public function getItems()
    {
        return $this->breadcrumbsManager->getItems();
    }

    public function classes() {
        $classes = [];

        if (!empty($this->property('adv_class'))) {
            $classes[] = $this->property('adv_class');
        }

        if (empty($classes)) {
            return '';
        }

        return ' ' . join(' ', $classes);

    }

    public function onRun()
    {
        $config['paths'] = Config::get('eev.breadcrumbs::paths');
        $config['params'] = Config::get('eev.breadcrumbs::params');
        $this->breadcrumbsManager = new \EEV\Breadcrumbs\Classes\Breadcrumbs($config, $this->page);
    }

}