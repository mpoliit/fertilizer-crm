@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@isset($fertilizer) Изменение @else Создание @endisset группы культур</h1>
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
                                  action="{{ (isset($fertilizer)) ? route('fertilizers.update', $fertilizer->id) : route('fertilizers.store') }}">
                                @csrf
                                @isset($fertilizer)
                                    @method('PATCH')
                                @endisset
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Наименование*</label>
                                        <input type="text"
                                               class="form-control @error('title') is-invalid @enderror"
                                               id="title"
                                               name="title"
                                               value="{{ old('title', $fertilizer->title ?? '') }}"
                                               autofocus
                                        >
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="azot">Норма Азот</label>
                                        <input type="number"
                                               step="0.01"
                                               class="form-control"
                                               id="azot"
                                               name="azot"
                                               value="{{ old('azot', $fertilizer->azot ?? '') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phosphor">Норма Фосфор</label>
                                        <input type="number"
                                               step="0.01"
                                               class="form-control"
                                               id="phosphor"
                                               name="phosphor"
                                               value="{{ old('phosphor', $fertilizer->phosphor ?? '') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="potassium">Норма Калий</label>
                                        <input type="number"
                                               step="0.01"
                                               class="form-control"
                                               id="potassium"
                                               name="potassium"
                                               value="{{ old('potassium', $fertilizer->potassium ?? '') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Группа культур*</label>
                                        <select class="form-control"
                                                id="crop_id"
                                                name="crop_id"
                                                required>
                                            @foreach($crops as $crop)
                                                <option
                                                        {{ old('crop_id') == $crop->id || $fertilizer->crop_id == $crop->id ? "selected" : "" }}
                                                        value="{{ $crop->id }}">{{ $crop->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="region">Регион</label>
                                        <input type="text"
                                               class="form-control"
                                               id="region"
                                               name="region"
                                               value="{{ old('region', $fertilizer->region ?? '') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Стоимость*</label>
                                        <input type="number"
                                               step="0.01"
                                               class="form-control @error('price') is-invalid @enderror"
                                               id="price"
                                               name="price"
                                               value="{{ old('price', $fertilizer->price ?? '') }}"
                                        >
                                        @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Описание</label>
                                        <textarea class="form-control"
                                                  rows="3"
                                                  id="description"
                                                  name="description">{{ old('description', $fertilizer->description ?? '') }}</textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="purpose">Назначение</label>
                                        <input type="text"
                                               class="form-control"
                                               id="purpose"
                                               name="purpose"
                                               value="{{ old('purpose', $fertilizer->purpose ?? '') }}">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">@isset($fertilizer)
                                            Изменить @else Создать @endisset</button>
                                </div>
                            </form>
                        </div>
                        @isset($fertilizer)
                            <form method="POST" action="{{ route('fertilizers.destroy', $fertilizer->id) }}">
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