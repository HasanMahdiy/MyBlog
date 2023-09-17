@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title" style="padding-top: 12px;">Iletişim Tablosu</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>AD SOYADI</th>
                                <th>Email</th>
                                <th>Konu</th>
                                <th>Mesajı</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->topic}}</td>
                                    <td>{{$item->message}}</td>
                                </tr>
                            @endforeach
                            </tbody>
@endsection
