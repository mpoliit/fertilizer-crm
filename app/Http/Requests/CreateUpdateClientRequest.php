<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateClientRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'agreement_date' => 'required|date',
            'delivery_cost' => 'required|numeric',
            'region' => 'required|string|max:255'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Наименование',
            'agreement_date' => 'Дата договора',
            'delivery_cost' => 'Стоимость поставки',
            'region' => 'Регион'
        ];
    }
}
