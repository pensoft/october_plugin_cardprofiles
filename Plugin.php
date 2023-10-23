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

    public function registerSettings()
    {
    }
}
