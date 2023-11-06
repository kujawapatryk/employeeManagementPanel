@if(isset($employee))

    <h2>Edytuj pracownika</h2>
    <form method="POST" action="{{ route('employees.update', $employee) }}">
@method('PATCH')

@else
    <h2>Dodaj nowego pracownika</h2>
    <form method="POST" action="{{ route('employees.store') }}">
@endif
@csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first-name">
                    Imię
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                       id="first-name"
                       type="text"
                       name="first_name"
                       value="{{ old('first_name', $employee->first_name ?? null) }}"
                       required
                >
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="last-name">
                    Nazwisko
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                       id="last-name"
                       type="text"
                       name="last_name"
                       value="{{ old('last_name', $employee->last_name ?? null) }}"
                       required
                >
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="company">
                    Firma
                </label>
                <select class="block w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="company"
                        name="company_id"
                        required
                >
                    <option value="">Wybierz firmę</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}"
                            {{ (old('company_id', $employee->company_id ?? '') == $company->id) ? 'selected' : '' }}
                        >
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    E-mail
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                       id="email"
                       type="text"
                       name="email"
                       placeholder="Dodaj adres e-mail"
                       value="{{ old('email', $employee->email ?? null) }}"
                       required
                >
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone-numbers">
                    Telefon(y)
                </label>
                <div id="phone-numbers-container">
                    @foreach (old('phone_numbers', $employee->phone_numbers ?? ['']) as $index => $phoneNumber)
                        <div class="flex items-center mb-2">
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                                   id="phone-numbers-{{ $index }}"
                                   type="text" name="phone_numbers[]"
                                   placeholder="Dodaj numer telefonu"
                                   value="{{ $phoneNumber }}"
                                   required
                            >
                            <button type="button" class="remove-phone-number ml-2 text-red-500">&times;</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" id="add-phone-number" class="mt-2 text-sm text-blue-500">+ Dodaj kolejny numer</button>
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="dietary-preferences">
                    Preferencje Żywieniowe
                </label>
                <select class="block w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="dietary-preferences"
                        name="dietary_preference_id"
                        required
                >
                    <option value="">Wybierz preferencje</option>
                    @foreach($dietaryPreferences as $preference)
                        <option value="{{ $preference->id }}"
                            {{ (old('dietary_preference_id', $employee->dietary_preference_id ?? '') == $preference->id) ? 'selected' : '' }}
                        >
                            {{ $preference->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 text-right">
                <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    @if(isset($employee))
                        Edytuj pracownika
                    @else
                        Dodaj pracownika
                    @endif
                </button>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.querySelector('#phone-numbers-container');
            const addButton = document.querySelector('#add-phone-number');

            addButton.addEventListener('click', function () {
                const newField = container.children[0].cloneNode(true);
                newField.querySelector('input').value = '';
                container.appendChild(newField);
            });

            container.addEventListener('click', function (event) {
                if (event.target.classList.contains('remove-phone-number')) {
                    event.target.parentNode.remove();
                }
            });
        });
    </script>

