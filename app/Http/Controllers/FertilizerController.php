<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateCropRequest;
use App\Http\Requests\CreateUpdateFertilizerRequest;
use App\Models\Crop;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class FertilizerController extends Controller
{
    public function index()
    {
        $columns = [
            '<i class="fas fa-cog"></i>',
            'ID',
            'Наименование',
            'Норма Азот',
            'Норма Фосфор',
            'Норма Калий',
            'Группа культур',
            'Регион',
            'Стоимость',
            'Описание',
            'Назначение',
            'Дата создания'
        ];

        $fertilizers = Fertilizer::all();

        return view('fertilizer.index', compact('columns', 'fertilizers'));
    }

    public function create()
    {
        $crops = Crop::all();

        return view('fertilizer.credit', compact('crops'));
    }

    public function store(CreateUpdateFertilizerRequest $request)
    {
        $data = $request->validated();

        Fertilizer::create($data);

        return redirect()->route('fertilizers.index');
    }

    public function edit(Fertilizer $fertilizer)
    {
        $crops = Crop::all();

        return view('fertilizer.credit', compact('fertilizer', 'crops'));
    }

    public function update(CreateUpdateFertilizerRequest $request, Fertilizer $fertilizer)
    {
        $data = $request->validated();

        $fertilizer->update($data);

        return redirect()->route('fertilizers.index');
    }

    public function destroy(Fertilizer $fertilizer)
    {
        $fertilizer->delete();

        return redirect()->route('fertilizers.index');
    }

    public function showTrashed()
    {
        $columns = [
            'ID',
            'Наименование',
            'Норма Азот',
            'Норма Фосфор',
            'Норма Калий',
            'Группа культур',
            'Регион',
            'Стоимость',
            'Описание',
            'Назначение',
            'Дата создания',
            'Дата удаления'
        ];

        $fertilizers = Fertilizer::onlyTrashed()->get();

        return view('fertilizer.trashed', compact('columns', 'fertilizers'));
    }
}
