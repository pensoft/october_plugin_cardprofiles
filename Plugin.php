<?php namespace Pensoft\Cardprofiles;

use Pensoft\Cardprofiles\Components\Items;
use System\Classes\PluginBase;


class Plugin extends PluginBase
{
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
