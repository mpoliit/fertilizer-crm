<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $columns = [
            '<i class="fas fa-cog"></i>',
            'ID',
            'Наименование',
            'Дата договора',
            'Стоимость поставки',
            'Регион',
            'Дата создания'
        ];

        $clients = Client::all();

        return view('client.index', compact('columns', 'clients'));
    }

    public function create()
    {

        return view('client.credit');
    }

    public function store(CreateUpdateClientRequest $request)
    {
        $data = $request->validated();

        Client::create($data);

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {

        return view('client.credit', compact('client'));
    }

    public function update(CreateUpdateClientRequest $request, Client $client)
    {
        $data = $request->validated();

        $client->update($data);

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index');
    }
}
