<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'email' => 'required|email|max:191',
            'contract' => 'required',
            'number' => 'required|size:16|regex:/(\+7)[ ][0-9]{3}[ ][0-9]{3}[\-][0-9]{2}[\-][0-9]{2}/',
        ];
    }
    public function messages()
    {
        return[
            // 'email.required' => 'Поле почта является обязательным',
            // 'email.email' => 'Неверный формат почты',
            // 'email.email' => 'Превышен размер поля почты',
            'number.required' => 'Поле номер телефона является обязательным',
            'number.regex' => 'Неверный формат номера телефона +7 xxx xxx-xx-xx',
            'number.size' => 'Неверный формат номера телефона +7 xxx xxx-xx-xx',
            'contract.required' => 'Выбор контракта является обязательным',
        ];
    }
}
