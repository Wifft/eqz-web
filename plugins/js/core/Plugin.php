<?php namespace JS\Core;

use System\Classes\PluginBase;

final class Plugin extends PluginBase
{
    /**
     * @inheritDoc
     */
    public function pluginDetails() : array
    {
        return [
            'name' => 'Core',
            'description' => 'Project core plugin',
            'author' => 'JS',
            'icon' => 'icon-gear'
        ];
    }
}
