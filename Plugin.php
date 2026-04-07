<?php namespace Pensoft\Cardprofiles;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function boot(): void {}

	public $require = ['Pensoft.Partners'];

    public function registerComponents(): array
    {
        return [];
    }

    public function registerPermissions(): array
    {
        return [
            'pensoft.cardprofiles.access' => [
                'tab' => 'Profile cards',
                'label' => 'Manage profile cards'
            ],
        ];
    }

    public function registerNavigation(): array
    {
        return [
            'profile-cards' => [
                'label'       => 'Profile cards',
                'url'         => \Backend::url('pensoft/cardprofiles/category'),
                'icon'        => 'icon-users',
                'permissions' => ['pensoft.cardprofiles.*'],
                'sideMenu' => [
                    'profile-cards-items' => [
                        'label'       => 'Items',
                        'url'         => \Backend::url('pensoft/cardprofiles/profiles'),
                        'icon'        => 'icon-users',
                        'permissions' => ['pensoft.cardprofiles.*'],
                    ],
                    'side-menu-item' => [
                        'label'       => 'Categories',
                        'url'         => \Backend::url('pensoft/cardprofiles/category'),
                        'icon'        => 'icon-sitemap',
                        'permissions' => ['pensoft.cardprofiles.*'],
                    ],

                ]
            ],
        ];
    }
}