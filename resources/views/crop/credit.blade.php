@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@isset($crop) Изменение @else Создание @endisset группы культур</h1>
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
                                  action="{{ (isset($crop)) ? route('crops.update', $crop->id) : route('crops.store') }}">
                                @csrf
                                @isset($crop)
                                    @method('PATCH')
                                @endisset
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Наименование*</label>
                                        <input type="text"
                                               class="form-control @error('title') is-invalid @enderror"
                                               id="title"
                                               name="title"
                                               value="{{ old('title', $crop->title ?? '') }}"
                                               autofocus
                                               required>
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">@isset($crop)
                                            Изменить @else Создать @endisset</button>
                                </div>
                            </form>
                        </div>
                        @isset($crop)
                            <form method="POST" action="{{ route('crops.destroy', $crop->id) }}">
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