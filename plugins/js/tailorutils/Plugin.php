<?php namespace JS\TailorUtils;

use Backend\Classes\NavigationManager;
use System\Classes\PluginBase;

final class Plugin extends PluginBase
{
    public const SORTABLE_BLUEPRINTS = [
        'OCTOBER.TAILOR.ENTRY_CREATORS_CREATOR',
        'OCTOBER.TAILOR.ENTRY_ROSTERS_ROSTER'
    ];

    /**
     * @inheritDoc
     */
    public function pluginDetails() : array
    {
        return [
            'name' => 'TailorUtils',
            'description' => 'Tailor utils',
            'author' => 'JS',
            'icon' => 'icon-gear'
        ];
    }

    /**
     * @inheritDoc
     */
    public function boot() : void
    {
        /** @var array */
        $navItems = NavigationManager::instance()->listMainMenuItems();

        /** @var string $key */
        /** @var \Backend\Classes\MainMenuItem $item */
        foreach ($navItems as $key => &$item) {
            if (in_array($key, self::SORTABLE_BLUEPRINTS)) {
                $item->config['url'] = self::replaceMenuUrl($item->config['url']);

                if (isset($item->config['sideMenu'])) {
                    /** @var \Backend\Classes\SideMenuItem $sideItem */
                    foreach ($item->config['sideMenu'] as &$sideItem) {
                        $sideItem->config['url'] = self::replaceMenuUrl($sideItem->config['url']);
                    }
                }
            }
        }
    }

    /**
     * @inheritDoc
     */
    private static function replaceMenuUrl(string $url) : string
    {
        return str_replace('tailor/entries', 'js/tailorutils/sortableentries', $url);
    }
}
