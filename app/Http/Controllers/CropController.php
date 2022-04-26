<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateCropRequest;
use App\Models\Crop;

class CropController extends Controller
{
    public function index()
    {
        $columns = [
            '<i class="fas fa-cog"></i>',
            'ID',
            'Наименование',
            'Дата создания'
        ];

        $crops = Crop::all();

        return view('crop.index', compact('columns', 'crops'));
    }

    public function create()
    {

        return view('crop.credit');
    }

    public function store(CreateUpdateCropRequest $request)
    {
        $data = $request->validated();

        Crop::create($data);

        return redirect()->route('crops.index');
    }

    public function edit(Crop $crop)
    {

        return view('crop.credit', compact('crop'));
    }

    public function update(CreateUpdateCropRequest $request, Crop $crop)
    {
        $data = $request->validated();

        $crop->update($data);

        return redirect()->route('crops.index');
    }

    public function destroy(Crop $crop)
    {
        $crop->delete();

        return redirect()->route('crops.index');
    }
}
