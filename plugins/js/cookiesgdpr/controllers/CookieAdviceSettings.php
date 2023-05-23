<?php namespace JS\Cookiesgdpr\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Lang;
use Flash;
use Backend;
use System\Classes\SettingsManager;
use ApplicationException;
use Exception;

/**
 * Cookie Advice Settings Back-end Controller
 */
class CookieAdviceSettings extends \System\Controllers\Settings
{
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('js.CookiesGdpr', 'gdpr', 'gdpr.settings');
    }

    //
    // Generated Form
    //

    public function update($author = 'RW', $plugin = 'CookiesGdpr', $code = 'cookieadvicesettings')
    {
        SettingsManager::setContext($author.'.'.$plugin, $code);

        $this->vars['parentLink'] = Backend::url('system/settings');
        $this->vars['parentLabel'] = Lang::get('system::lang.settings.menu_label');

        try {
            if (!$item = $this->findSettingItem($author, $plugin, $code)) {
                throw new ApplicationException(Lang::get('system::lang.settings.not_found'));
            }

            $this->pageTitle = $item->label;

            $model = $this->createModel($item);
            $this->initWidgets($model);
        } catch (Exception $ex) {
            $this->handleError($ex);
        }
    }

    public function update_onSave($author = 'RW', $plugin = 'CookiesGdpr', $code = 'cookieadvicesettings')
    {
        $item = $this->findSettingItem($author, $plugin, $code);
        $model = $this->createModel($item);
        $this->initWidgets($model);

        $saveData = $this->formWidget->getSaveData();
        foreach ($saveData as $attribute => $value) {
            $model->{$attribute} = $value;
        }
        $model->save(null, $this->formWidget->getSessionKey());

        Flash::success(Lang::get('system::lang.settings.update_success', ['name' => Lang::get($item->label)]));

        /*
         * Handle redirect
         */
        if ($redirectUrl = post('redirect', true)) {
            $redirectUrl = ($item->context == 'mysettings')
                ? 'system/settings/mysettings'
                : 'system/settings';

            return Backend::redirect($redirectUrl);
        }
    }
}
