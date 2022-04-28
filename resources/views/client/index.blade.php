@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Клиенты</h1>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('clients.create') }}" class="btn btn-outline-primary float-right">Создать</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatables" class="table table-bordered table-striped">
                                    @include('_include.table-head', $columns)
                                    <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <td><a href="{{ route('clients.edit', $client->id) }}"><i class="fas fa-edit"></i></a></td>
                                            <td>{{ $client->id }}</td>
                                            <td>{{ $client->title }}</td>
                                            <td>{{ date('d.m.Y', strtotime($client->agreement_date)) }}</td>
                                            <td>{{ $client->delivery_cost }}</td>
                                            <td>{{ $client->region }}</td>
                                            <td>{{ date('H:i:s d.m.Y', strtotime($client->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                    @include('_include.table-foot', $columns)
                                </table>
                                <a href="{{ route('clients.trashed') }}" class="btn btn-danger">Просмотр удаленных клиентов</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('footer_scripts')
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
            $("#datatables").DataTable( {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/ru.json'
                }
            } );
        });
    </script>
@endsection