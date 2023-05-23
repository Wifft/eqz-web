<?php namespace JS\CookiesGdpr\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Legals extends Controller
{
    public $require = ['js.Utils'];

    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController'
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'manage_legal'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('js.CookiesGdpr', 'gdpr', 'gdpr.legal');
    }
}
