<?php namespace Pensoft\Cardprofiles;

use Pensoft\Cardprofiles\Components\Items;
use System\Classes\PluginBase;
use SaurabhDhariwal\Revisionhistory\Classes\Diff as Diff;
use System\Models\Revision as Revision;

class Plugin extends PluginBase
{
    public function boot(){
        /* Extetions for revision */
        Revision::extend(function($model){
            /* Revison can access to the login user */
            $model->belongsTo['user'] = ['Backend\Models\User'];

            /* Revision can use diff function */
            $model->addDynamicMethod('getDiff', function() use ($model){
                return Diff::toHTML(Diff::compare($model->old_value, $model->new_value));
            });
        });
    }

	public $require = ['Pensoft.Partners'];

    public function registerComponents()
    {
        return [
            Items::class => 'profile_records'
        ];
    }

    public function registerPermissions()
    {
        return [
            'pensoft.cardprofiles.access' => [
                'tab' => 'Profile cards',
                'label' => 'Manage profile cards'
            ],
        ];
    }

    public function registerNavigation()
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
                        'permissions' => ['pensoft.accordions.*'],
                    ],
                    'side-menu-item' => [
                        'label'       => 'Categories',
                        'url'         => \Backend::url('pensoft/cardprofiles/category'),
                        'icon'        => 'icon-sitemap',
                        'permissions' => ['pensoft.accordions.*'],
                    ],

                ]
            ],
        ];
    }
}
