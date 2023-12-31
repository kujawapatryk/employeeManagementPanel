@extends('layouts.main')

@section('content')

    <form id="search-form" action="" method="GET" class="mb-4">
        <input type="text" name="search" placeholder="Szukaj..." value="{{ request('search') }}" class="mb-4" />
        <select name="company_id" class="mb-4">
            <option value="">Wybierz firmę</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}" {{ request('company_id') == $company->id ? 'selected' : '' }}>
                    {{ $company->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Filtruj</button>
    </form>


    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <x-sortable-column column="first_name" :currentSort="request('sort_by')" :currentOrder="request('order', 'asc')">
                Imię
            </x-sortable-column>
            <x-sortable-column column="last_name" :currentSort="request('sort_by')" :currentOrder="request('order', 'asc')">
                Nazwisko
            </x-sortable-column>
            <x-sortable-column column="email" :currentSort="request('sort_by')" :currentOrder="request('order', 'asc')">
                E-mail
            </x-sortable-column>
            <x-sortable-column column="company" :currentSort="request('sort_by')" :currentOrder="request('order', 'asc')">
                Firma
            </x-sortable-column>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telefon</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preferencje Żywieniowe</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Akcje</th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach($employees as $employee)
            <tr class="@if($loop->odd) bg-gray-50 @endif">
                <td class="px-6 py-4 whitespace-nowrap">{{ $employee->first_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $employee->last_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $employee->email }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $employee->company->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if(is_array($employee->phone_numbers))

                        @foreach($employee->phone_numbers as $phone)
                            {{ $phone }}<br>
                        @endforeach
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $employee->dietaryPreference->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('employees.edit', $employee) }}" class="bg-indigo-600 text-white rounded px-4 py-2 hover:bg-indigo-700 mr-2">Edytuj</a>
                    <form method="post" action="{{ route('employees.remove', $employee->id) }}" class="inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-red-600 text-white rounded px-4 py-2 hover:bg-red-700 ml-2">Usuń</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $employees->appends(request()->query())->links() }}



@endsection
