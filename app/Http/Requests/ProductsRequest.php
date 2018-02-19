<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'type.id'     => 'required',
            'price'       => 'required',

            'en.title'       => 'required',
            'en.description' => 'required',
            'en.body'        => 'required',
            'ru.title'       => 'required',
            'ru.description' => 'required',
            'ru.body'        => 'required',
            'ge.title'       => 'required',
            'ge.description' => 'required',
            'ge.body'        => 'required',
        ];
    }
}
