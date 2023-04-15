<?php
namespace JS\TailorUtils\Controllers;

use Backend\Behaviors\FormController;

use Tailor\Behaviors\DraftController;
use Tailor\Behaviors\PreviewController;
use Tailor\Behaviors\VersionController;

use Tailor\Controllers\Entries;

use JS\TailorUtils\Behaviors\SortableListController;

final class SortableEntries extends Entries
{
    /**
     * @inheritDoc
     */
    public $implement = [
        SortableListController::class,
        FormController::class,
        PreviewController::class,
        VersionController::class,
        DraftController::class,
    ];

    /**
     * @inheritDoc
     */
    public function index() : mixed
    {
        if ($this->hasFatalError()) {
            return null;
        }

        if ($this->actionMethod) {
            $this->addJs('/modules/tailor/assets/js/tailor-app.base.js');
            $this->addJs('/modules/tailor/assets/js/tailor-entry.js');

            $this->registerVueComponent(\Backend\VueComponents\Document::class);
            $this->registerVueComponent(\Backend\VueComponents\DropdownMenuButton::class);
            $this->registerVueComponent(\Tailor\VueComponents\PublishingControls::class);
            $this->registerVueComponent(\Tailor\VueComponents\PublishButton::class);
            $this->registerVueComponent(\Tailor\VueComponents\DraftNotes::class);

            return $this->{$this->actionMethod}(...$this->params);
        }

        $this->asExtension('SortableListController')->index();

        $this->prepareVars();

        return null;
    }

    /**
     * listGetConfig
     */
    public function listGetConfig($definition)
    {
        $config = $this->asExtension('SortableListController')->listGetConfig($definition);

        if ($this->isSectionStructured()) {
            $config->structure = [
                'maxDepth' => $this->activeSource->getMaxDepth(),
                'showTree' => $this->activeSource->hasTree(),
            ] + ((array) $this->activeSource->structure);
        }

        // Each source needs its own session store
        $config->widgetAlias = camel_case($definition . '-' . $this->activeSource->handleSlug);

        return $config;
    }
}
