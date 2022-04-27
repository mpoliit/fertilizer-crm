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
                                               class="form-control @error('azot') is-invalid @enderror"
                                               id="azot"
                                               name="azot"
                                               value="{{ old('azot', $fertilizer->azot ?? '') }}">
                                        @error('azot')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phosphor">Норма Фосфор</label>
                                        <input type="number"
                                               step="0.01"
                                               class="form-control @error('phosphor') is-invalid @enderror"
                                               id="phosphor"
                                               name="phosphor"
                                               value="{{ old('phosphor', $fertilizer->phosphor ?? '') }}">
                                        @error('phosphor')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="potassium">Норма Калий</label>
                                        <input type="number"
                                               step="0.01"
                                               class="form-control @error('potassium') is-invalid @enderror"
                                               id="potassium"
                                               name="potassium"
                                               value="{{ old('potassium', $fertilizer->potassium ?? '') }}">
                                        @error('potassium')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Группа культур*</label>
                                        <select class="form-control @error('crop_id') is-invalid @enderror"
                                                id="crop_id"
                                                name="crop_id"
                                                required>
                                            @foreach($crops as $crop)
                                                <option
                                                        {{ old('crop_id') == $crop->id || $fertilizer->crop_id == $crop->id ? "selected" : "" }}
                                                        value="{{ $crop->id }}">{{ $crop->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('crop_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="region">Регион</label>
                                        <input type="text"
                                               class="form-control @error('region') is-invalid @enderror"
                                               id="region"
                                               name="region"
                                               value="{{ old('region', $fertilizer->region ?? '') }}">
                                        @error('region')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                                  rows="3"
                                                  id="description"
                                                  name="description">{{ old('description', $fertilizer->description ?? '') }}</textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="purpose">Назначение</label>
                                        <input type="text"
                                               class="form-control @error('purpose') is-invalid @enderror"
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