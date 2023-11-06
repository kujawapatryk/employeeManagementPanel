<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
    <a href="{{ route(Route::currentRouteName(), array_merge(request()->except(['sort_by', 'order']), ['sort_by' => $column, 'order' => $currentOrder == 'asc' ? 'desc' : 'asc'])) }}"
       aria-label="Sort by {{ $slot }} {{ $currentOrder == 'asc' ? 'descending' : 'ascending' }}">
        {{ $slot }}
        @if($currentSort == $column)
            @if($currentOrder == 'asc')
                &#9650;
            @else
                &#9660;
            @endif
        @else
            &#8693;
        @endif
    </a>
</th>
