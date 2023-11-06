<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SortableColumn extends Component
{
    /**
     * Create a new component instance.
     */
    public string $column;
    public ?string $currentSort;
    public string $currentOrder;
    public function __construct($column, $currentSort = null, $currentOrder = 'asc')
    {
        $this->column = $column;
        $this->currentSort = $currentSort;
        $this->currentOrder = $currentOrder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sortable-column');
    }
}
