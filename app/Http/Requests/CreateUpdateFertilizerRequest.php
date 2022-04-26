<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateFertilizerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'azot' => 'nullable|numeric',
            'phosphor' => 'nullable|numeric',
            'potassium' => 'nullable|numeric',
            'crop_id' => 'required|exists:App\Models\Crop,id',
            'region' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string|max:6000',
            'purpose' => 'nullable|string',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Наименование',
            'azot' => 'Норма Азот',
            'phosphor' => 'Норма Фосфор',
            'potassium' => 'Норма Калий',
            'crop_id' => 'Группа культур',
            'region' => 'Регион',
            'price' => 'Стоимость',
            'description' => 'Описание',
            'purpose' => 'Назначение',
        ];
    }
}
