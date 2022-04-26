@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@isset($client) Изменение @else Создание @endisset клиента</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <form method="POST"
                                  action="{{ (isset($client)) ? route('clients.update', $client->id) : route('clients.store') }}">
                                @csrf
                                @isset($client)
                                    @method('PATCH')
                                @endisset
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Наименование*</label>
                                        <input type="text"
                                               class="form-control @error('title') is-invalid @enderror"
                                               id="title"
                                               name="title"
                                               value="{{ old('title', $client->title ?? '') }}"
                                               autofocus
                                               required>
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="agreement_date">Дата договора*</label>
                                        <input type="date"
                                               class="form-control @error('agreement_date') is-invalid @enderror"
                                               id="agreement_date"
                                               name="agreement_date"
                                               value="{{ old('agreement_date', $client->agreement_date ?? '') }}"
                                               required>
                                        @error('agreement_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="delivery_cost">Стоимость поставки*</label>
                                        <input type="number"
                                               step="0.01"
                                               class="form-control @error('delivery_cost') is-invalid @enderror"
                                               id="delivery_cost"
                                               name="delivery_cost"
                                               value="{{ old('delivery_cost', $client->delivery_cost ?? '') }}"
                                               required>
                                        @error('delivery_cost')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="region">Регион*</label>
                                        <input type="text" class="form-control @error('region') is-invalid @enderror"
                                               id="region"
                                               name="region"
                                               value="{{ old('region', $client->region ?? '') }}"
                                               required>
                                        @error('region')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">@isset($client)
                                            Изменить @else Создать @endisset</button>
                                </div>
                            </form>
                        </div>
                        @isset($client)
                            <form method="POST" action="{{ route('clients.destroy', $client->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-left">Удалить</button>
                            </form>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection