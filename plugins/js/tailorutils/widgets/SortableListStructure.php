<?php
namespace JS\TailorUtils\Widgets;

use Illuminate\Pagination\LengthAwarePaginator;

use October\Rain\Exception\ForbiddenException;

use Backend\Widgets\ListStructure;

final class SortableListStructure extends ListStructure
{
    /**
     * @inheritDoc
     */
    public function prepareVars() : void
    {
        parent::prepareVars();

        $this->records = new LengthAwarePaginator($this->records, $this->records->count(), $this->recordsPerPage);

        $this->showPagination = true;

        $this->vars['showPagination'] = $this->showPagination;
        $this->vars['pageCurrent'] = $this->records->currentPage();

        if ($this->showPageNumbers) {
            $this->vars['recordElements'] = $this->getPaginationElements($this->records);
            $this->vars['recordTotal'] = $this->records->total();
            $this->vars['pageLast'] = $this->records->lastPage();
            $this->vars['pageFrom'] = $this->records->firstItem();
            $this->vars['pageTo'] = $this->records->lastItem();

            return;
        }

        $this->vars['hasMorePages'] = $this->records->hasMorePages();
    }

    /**
     * @inheritDoc
     */
    public function onReorder() : ?array
    {
        if (!$this->hasStructurePermission()) {
            throw new ForbiddenException;
        }

        $itemId = post('record_id');
        if (!$itemId) {
            return null;
        }

        $item = $this->model->newQueryWithoutScopes()->find($itemId);
        if (!$item) {
            return null;
        }

        $this->reorderForSortable($item);

        $this->fireSystemEvent('backend.list.reorderStructure', [$item]);

        return $this->onRefresh();
    }
}
