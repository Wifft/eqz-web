<?php
namespace JS\TailorUtils\Behaviors;

use Backend\Behaviors\ListController;

use JS\TailorUtils\Widgets\SortableListStructure;

final class SortableListController extends ListController
{
    /**
     * @inheritDoc
     */
    public function makeList($definition = null) : SortableListStructure
    {
        if (!$definition || !isset($this->listDefinitions[$definition])) {
            $definition = $this->primaryDefinition;
        }

        $listConfig = $this->config = $this->controller->listGetConfig($definition);

        // Create the model
        //
        $model = $this->createModel();
        $model = $this->controller->listExtendModel($model, $definition);

        // Prepare the list widget
        //
        $widgetConfig = $this->makeConfig($listConfig->list);
        $widgetConfig->model = $model;
        $widgetConfig->alias = $listConfig->widgetAlias ?? $definition;

        // Prepare the columns configuration
        //
        $configFieldsToTransfer = [
            'recordUrl',
            'recordOnClick',
            'recordsPerPage',
            'perPageOptions',
            'showPageNumbers',
            'noRecordsMessage',
            'defaultSort',
            'showSorting',
            'showSetup',
            'expandLastColumn',
            'showCheckboxes',
            'customViewPath',
            'customPageName',
        ];

        foreach ($configFieldsToTransfer as $field) {
            if (isset($listConfig->{$field})) {
                $widgetConfig->{$field} = $listConfig->{$field};
            }
        }

        // List Widget with extensibility
        //
        $structureConfig = $this->makeListStructureConfig($widgetConfig, $listConfig);
        if ($structureConfig) {
            $widget = $this->makeWidget(SortableListStructure::class, $structureConfig);
        }

        $widget->bindEvent('list.extendColumns', function () use ($widget) {
            $this->controller->listExtendColumns($widget);
        });

        $widget->bindEvent('list.extendQueryBefore', function ($query) use ($definition) {
            $this->controller->listExtendQueryBefore($query, $definition);
        });

        $widget->bindEvent('list.extendQuery', function ($query) use ($definition) {
            $this->controller->listExtendQuery($query, $definition);
        });

        $widget->bindEvent('list.extendRecords', function ($records) use ($definition) {
            return $this->controller->listExtendRecords($records, $definition);
        });

        $widget->bindEvent('list.injectRowClass', function ($record) use ($definition) {
            return $this->controller->listInjectRowClass($record, $definition);
        });

        $widget->bindEvent('list.overrideColumnValue', function ($record, $column, $value) use ($definition) {
            return $this->controller->listOverrideColumnValue($record, $column->columnName, $definition);
        });

        $widget->bindEvent('list.overrideHeaderValue', function ($column, $value) use ($definition) {
            return $this->controller->listOverrideHeaderValue($column->columnName, $definition);
        });

        $widget->bindEvent('list.overrideRecordAction', function ($record, $url, $onClick) use ($definition) {
            return $this->controller->listOverrideRecordUrl($record, $definition);
        });

        $widget->bindEvent('list.reorderStructure', function ($record) use ($definition) {
            return $this->controller->listAfterReorder($record, $definition);
        });

        $widget->bindEvent('list.refresh', function ($result) use ($widget, $definition) {
            return $this->controller->listExtendRefreshResults($widget, $result, $definition);
        });

        $widget->bindToController();

        // Prepare the toolbar widget (optional)
        //
        if (isset($listConfig->toolbar)) {
            $toolbarConfig = $this->makeConfig($listConfig->toolbar);
            $toolbarConfig->alias = $widget->alias . 'Toolbar';
            $toolbarWidget = $this->makeWidget(\Backend\Widgets\Toolbar::class, $toolbarConfig);
            $toolbarWidget->listWidgetId = $widget->getId();
            $toolbarWidget->cssClasses[] = 'list-header';

            // Link the Search Widget to the List Widget
            if ($searchWidget = $toolbarWidget->getSearchWidget()) {
                $searchWidget->bindEvent('search.submit', function () use ($widget, $searchWidget) {
                    $widget->setSearchTerm($searchWidget->getActiveTerm(), true);
                    return $widget->onRefresh();
                });

                // Pass search options
                $widget->setSearchOptions([
                    'mode' => $searchWidget->mode,
                    'scope' => $searchWidget->scope,
                ]);

                // Find predefined search term
                $widget->setSearchTerm($searchWidget->getActiveTerm());
            }

            // Bind to controller
            $toolbarWidget->bindToController();

            $this->toolbarWidgets[$definition] = $toolbarWidget;
        }

        // Prepare the filter widget (optional)
        //
        if (isset($listConfig->filter)) {
            $widget->cssClasses[] = 'list-flush';

            $filterConfig = $this->makeConfig($listConfig->filter);
            $filterConfig->model = $model;
            $filterConfig->alias = $widget->alias . 'Filter';
            $filterWidget = $this->makeWidget(\Backend\Widgets\Filter::class, $filterConfig);

            // Filter the list when the scopes are changed
            $filterWidget->bindEvent('filter.update', function() use ($widget, $filterWidget) {
                return $widget->onFilter();
            });

            // Filter Widget with extensibility
            $filterWidget->bindEvent('filter.extendScopes', function() use ($filterWidget) {
                $this->controller->listFilterExtendScopes($filterWidget);
            });

            // Extend the query of the list of options
            $filterWidget->bindEvent('filter.extendQuery', function($query, $scope) {
                $this->controller->listFilterExtendQuery($query, $scope);
            });

            // Apply predefined filter values
            $widget->addFilter([$filterWidget, 'applyAllScopesToQuery']);

            // Bind to controller
            $filterWidget->bindToController();

            $this->filterWidgets[$definition] = $filterWidget;
        }

        return $widget;
    }
}

