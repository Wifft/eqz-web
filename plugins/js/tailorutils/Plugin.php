<?php namespace JS\TailorUtils;

use Backend\Classes\NavigationManager;
use System\Classes\PluginBase;
use Yaml;

final class Plugin extends PluginBase
{
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
            if (in_array($key, self::getSortableBlueprints())) {
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
     * Gets all tailor blueprints that has 'sort_order' field.
     *
     * @return array
     *
     * @static
     */
    private static function getSortableBlueprints() : array
    {
        /** @var array */
        $sortableBlueprints = [];

        /** @var string */
        $blueprintsPath = __DIR__ . '/../../../app/blueprints';

        /** @var array */
        $blueprintFolders = array_slice(scandir($blueprintsPath), 3);

        /** @var string */
        foreach ($blueprintFolders as $folder) {
            /** @var string */
            $currentFolder = "$blueprintsPath/$folder";
            if (is_dir($currentFolder)) {
                /** @var array */
                $blueprintEntries = array_slice(scandir($currentFolder), 2);

                /** @var string */
                foreach ($blueprintEntries as $entry) {
                    $entryFile = "$currentFolder/$entry";
                    if (is_file($entryFile)) {
                        /** @var array */
                        $entryData = Yaml::parseFile($entryFile);
                        if (isset($entryData['fields']['sort_order'])) {
                            $sortableBlueprints[] = self::getNavigationItemKey($entryData['handle']);
                        }
                    }
                }
            }
        }

        return $sortableBlueprints;
    }

    /**
     * Builds a navigation key for the current sortable item.
     *
     * @param string $rawName given raw handle name.
     *
     * @return string
     *
     * @static
     */
    private static function getNavigationItemKey(string $rawName) : string
    {
        $blueprintName = str_replace('\\', '_', strtoupper($rawName));

        return "OCTOBER.TAILOR.ENTRY_$blueprintName";
    }

    /**
     * Replaces menu item navigation URL.
     *
     * @param string $url current URL.
     *
     * @return string
     *
     * @static
     */
    private static function replaceMenuUrl(string $url) : string
    {
        return str_replace('tailor/entries', 'js/tailorutils/sortableentries', $url);
    }
}
