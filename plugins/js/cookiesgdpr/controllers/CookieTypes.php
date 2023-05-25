<?php namespace JS\CookiesGdpr\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Cookie Types Back-end Controller
 */
class CookieTypes extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = [
        'js_manage_cookies'
    ];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('JS.CookiesGdpr', 'gdpr', 'gdpr.types');
    }
}
