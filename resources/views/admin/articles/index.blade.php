@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title" style="padding-top: 12px;">Nesneler Tablosu</h4>
                        <a href="{{route('admin.articles.create')}}" class="btn btn-primary mr-2">Eklemek</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategoriler</th>
                                <th>Başlık</th>
                                <th>Resim</th>
                                <th>İçerik</th>
                                <th>Tıklanma Sayısı</th>
                                <th>Slug</th>
                                <th>Eklenme Zamanı</th>
                                <th>Hareketler</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $item)
                                <tr>
                                    <td>{{$loop->iteration ?? ''}}</td>
                                    <td>{{$item->category->name ?? ''}}</td>
                                    <td>{{Str::limit($item->title ?? '',40)}}</td>
                                    <td>
                                        <img width="60" src="{{asset('images')}}/{{$item->image ?? ''}}" alt="">
                                    </td>
                                    <td>{{Str::limit($item->content ?? '',60)}}</td>
                                    <td>{{$item->hit ?? ''}}</td>
                                    <td>{{Str::limit($item->slug ?? '' , 11)}}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i:s') }}</td>
                                    <td>
                                        <form action="{{route('admin.articles.destroy', $item->id)}}" method="post">
                                            {!! @csrf_field() !!}
                                            {{ method_field('DELETE') }}
                                            <a href="{{route('admin.articles.edit', $item->id)}}" class="btn btn-info">Düzenle</a>
                                            <button onclick="return confirm('Emin misiniz ?')" class="btn btn-danger">Sil</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
@endsection
