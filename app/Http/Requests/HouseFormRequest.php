<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class HouseFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'nullable|regex:/^[\w а-я_-]*$/ui|min:3|max:15',
            'priceMin'  => 'nullable|regex:/^\d*(\.\d{1,2})?$/|required_with:priceMax',
            'priceMax'  => 'nullable|regex:/^\d*(\.\d{1,2})?$/|required_with:priceMin|gt:priceMin',
            'bedroom'   => 'nullable|integer|min:0|max:10',
            'bathroom'  => 'nullable|integer|min:0|max:10',
            'storey'    => 'nullable|integer|min:0|max:10',
            'garage'    => 'nullable|integer|min:0|max:10'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {

        return [
            'name.regex' => 'Имя дома: буквы, цифры, пробел, _ -',
            'name.min' => 'Имя должно быть >= 3 символов',
            'name.max' => 'Имя должно быть <= 15 символов',
            'priceMin.regex' => 'Мин. цена может содержать цифры и точку (макс. два знака после точки)',
            'priceMin.required_with' => 'Поле "мин. цена" обязательно если заполнено поле "макс. цена"',
            'priceMax.regex' => 'Макс. цена может содержать цифры и точку (макс. два знака после точки)',
            'priceMax.required_with' => 'Поле "макс. цена" обязательно если заполнено поле "мин. цена"',
            'priceMax.gt' => 'Макс. цена должна быть больше мин. цены',
            'bedroom.integer'   => 'Количество спален должно быть целым числом',
            'bedroom.min'   => 'Минимальное количество спален: 0',
            'bedroom.max'   => 'Максимальное количество спален: 10',
            'bathroom.integer'   => 'Количество ванных должно быть целым числом',
            'bathroom.min'   => 'Минимальное количество ванных: 0',
            'bathroom.max'   => 'Максимальное количество ванных: 10',
            'storey.integer'   => 'Количество этажей должно быть целым числом',
            'storey.min'   => 'Минимальное количество этажей: 0',
            'storey.max'   => 'Максимальное количество этажей: 10',
            'garage.integer'   => 'Количество гаражей должно быть целым числом',
            'garage.min'   => 'Минимальное количество гаражей: 0',
            'garage.max'   => 'Максимальное количество гаражей: 10',
        ];
    }



}
