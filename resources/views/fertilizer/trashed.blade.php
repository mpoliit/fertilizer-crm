@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Удаленные удобрения</h1>
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
                                    @foreach($fertilizers as $fertilizer)
                                        <tr>
                                            <td>{{ $fertilizer->id }}</td>
                                            <td>{{ $fertilizer->title }}</td>
                                            <td>{{ $fertilizer->azot }}</td>
                                            <td>{{ $fertilizer->phosphor }}</td>
                                            <td>{{ $fertilizer->potassium }}</td>
                                            <td>{{ $fertilizer->crop->title }}</td>
                                            <td>{{ $fertilizer->region }}</td>
                                            <td>{{ $fertilizer->price }}</td>
                                            <td>{{ $fertilizer->description }}</td>
                                            <td>{{ $fertilizer->purpose }}</td>
                                            <td>{{ date('H:i:s d.m.Y', strtotime($fertilizer->created_at)) }}</td>
                                            <td>{{ date('H:i:s d.m.Y', strtotime($fertilizer->deleted_at)) }}</td>
                                        </tr>
                                    @endforeach
                                    @include('_include.table-foot', $columns)
                                </table>
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