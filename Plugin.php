<?php namespace Yfktn\InputMask;

use System\Classes\PluginBase;

/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
    }

    public function registerFormWidgets()
    {
        return [
            'Yfktn\InputMask\FormWidgets\NumberInputMask' => [
                'label' => 'OCNumberInputMask',
                'code' => 'ocnumberinputmask',
            ],
            'Yfktn\InputMask\FormWidgets\InputMask' => [
                'label' => 'OCInputMask',
                'code' => 'ocinputmask',
            ]
        ];
    }
}
