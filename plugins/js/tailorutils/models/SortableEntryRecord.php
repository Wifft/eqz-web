<?php
namespace JS\TailorUtils\Models;

use October\Rain\Database\Traits\Sortable;

use Tailor\Models\EntryRecord;

final class SortableEntryRecord extends EntryRecord
{
    use Sortable;
}
