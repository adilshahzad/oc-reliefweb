<?php namespace Adil\ReliefWebAPI;

use Backend;
use System\Classes\PluginBase;
use RWAPIClient;

/**
 * ReliefWebAPI Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'ReliefWeb API',
            'description' => 'Easy to use plugin to fetch available information from https://reliefweb.int',
            'author'      => 'Adil',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Adil\ReliefWebAPI\Components\Disaster' => 'disaster',
            'Adil\ReliefWebAPI\Components\Report' => 'report',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {

        return [
            'adil.reliefwebapi.some_permission' => [
                'tab' => 'ReliefWebAPI',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return;

        return [
            'reliefwebapi' => [
                'label'       => 'ReliefWebAPI',
                'url'         => Backend::url('adil/reliefwebapi/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['adil.reliefwebapi.*'],
                'order'       => 500,
            ],
        ];
    }
}
