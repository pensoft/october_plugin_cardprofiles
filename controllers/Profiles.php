<?php namespace Pensoft\Cardprofiles\Controllers;

use Backend\Classes\Controller;
use Backend\Behaviors\ListController;
use Backend\Behaviors\FormController;
use Backend\Behaviors\ReorderController;
use BackendMenu;

class Profiles extends Controller
{
    public $implement = [
        ListController::class,
        FormController::class,
        ReorderController::class
    ];

    public string $listConfig = 'config_list.yaml';
    public string $formConfig = 'config_form.yaml';
    public string $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Pensoft.Cardprofiles', 'profile-cards', 'profile-cards-items');
    }
}