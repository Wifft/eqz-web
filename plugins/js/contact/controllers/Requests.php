<?php
namespace JS\Contact\Controllers;

use Backend\Behaviors\FormController;
use Backend\Behaviors\ListController;

use Backend\Classes\Controller;

use Backend\Facades\BackendMenu;

class Requests extends Controller
{
    /**
     * @inheritDoc
     */
    public $implement = [
        ListController::class,
        FormController::class
    ];

    /**
     * @inheritDoc
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @inheritDoc
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @inheritDoc
     */
    public $requiredPermissions = [
        'js.contact::permission.visibility'
    ];

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('JS.Contact', 'main-menu-contact');
    }
}
