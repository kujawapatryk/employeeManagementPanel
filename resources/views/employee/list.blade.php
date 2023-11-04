@extends('layouts.main')

@section('content')

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imię</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nazwisko</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Firma</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telefon</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preferencje Żywieniowe</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Akcje</th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
{{--        @dd($employees)--}}
        @foreach($employees as $employee)
{{--            @dd($employee)--}}
            <tr class="@if($loop->odd) bg-gray-50 @endif">
                <td class="px-6 py-4 whitespace-nowrap">{{ $employee->first_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $employee->last_name }}</td>
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
                    <a href="{{ route('employees.show', $employee) }}" class="text-indigo-600 hover:text-indigo-900">Edytuj</a>
                    <form method="post" action="{{ route('employees.remove', $employee) }}" class="inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-red-600 hover:text-red-800">Usuń</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
