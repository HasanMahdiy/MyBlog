@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title" style="padding-top: 12px;">Kategoriler Tablosu</h4>
                    <a href="{{route('admin.category.create')}}" class="btn btn-primary mr-2">Eklemek</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>İsmi</th>
                                <th>Slug</th>
                                <th>Eklenme Zamanı</th>
                                <th>Hareketler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>{{ \Carbon\Carbon::parse($category->created_at)->format('d/m/Y H:i:s') }}</td>
                                <td>
                                    <form action="{{route('admin.category.destroy', $category->id)}}" method="post">
                                        {!! @csrf_field() !!}
                                        @method('DELETE')
                                    <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-info">Düzenle</a>
                                    <button onclick="return confirm('Emin misiniz ?')" class="btn btn-danger">Sil</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
@endsection
