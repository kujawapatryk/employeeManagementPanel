<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email,',
            'company_id' => 'required|integer|exists:companies,id',
            'phone_numbers' => 'required|array',
            'phone_numbers.*' => 'required|string|distinct|min:7',
            'dietary_preference_id' => 'required|integer|exists:dietary_preferences,id',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Pole imię jest wymagane.',
            'first_name.max' => 'Imię może zawierać maksymalnie 255 znaków.',
            'last_name.required' => 'Pole nazwisko jest wymagane.',
            'last_name.max' => 'Nazwisko może zawierać maksymalnie 255 znaków.',
            'company_id.required' => 'Musisz wybrać firmę z listy.',
            'company_id.integer' => 'Wybrana firma nie istnieje.',
            'company_id.exists' => 'Wybrana firma nie istnieje w bazie danych.',
            'email.required' => 'Pole e-mail jest wymagane.',
            'email.string' => 'Pole e-mail musi być ciągiem znaków.',
            'email.email' => 'Pole e-mail musi być prawidłowym adresem e-mail.',
            'email.max' => 'Pole e-mail może zawierać maksymalnie 255 znaków.',
            'email.unique' => 'Podany adres e-mail jest już używany.',
            'phone_numbers.required' => 'Musisz podać przynajmniej jeden numer telefonu.',
            'phone_numbers.*.string' => 'Numer telefonu musi być ciągiem znaków.',
            'phone_numbers.*.distinct' => 'Numery telefonów nie mogą się powtarzać.',
            'phone_numbers.*.min' => 'Każdy z numerów telefonów musi mieć przynajmniej 7 cyfr.',
            'dietary_preference_id.required' => 'Musisz wybrać preferencje żywieniowe.',
            'dietary_preference_id.integer' => 'Wybrane preferencje żywieniowe nie istnieją w bazie danych.',
            'dietary_preference_id.exists' => 'Wybrane preferencje żywieniowe nie istnieją w bazie danych.',
        ];
    }

}
