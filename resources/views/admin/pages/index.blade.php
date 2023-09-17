@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title" style="padding-top: 12px;">Sayfalar Tablosu</h4>
                        <a href="{{route('admin.pages.create')}}" class="btn btn-primary mr-2">Eklemek</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Başlık</th>
                                <th>İmage</th>
                                <th>İçerik</th>
                                <th>Slug</th>
                                <th>Order</th>
                                <th>Eklenme Zamanı</th>
                                <th>Hareketler</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $page)
                                <tr>
                                    <td>{{$loop->iteration ?? ''}}</td>
                                    <td>{{Str::limit($page->title ?? '',40)}}</td>
                                    <td>
                                        <img width="60" src="{{asset('images')}}/{{$page->image ?? ''}}" alt="">
                                    </td>
                                    <td>{!! Str::limit($page->content ?? '', 60) !!}</td>
                                    <td>{{$page->slug ?? ''}}</td>
                                    <td>{{$page->order ?? ''}}</td>
                                    <td>{{\Carbon\Carbon::parse($page->created_at)->format('d/m/Y H:i:s')}}</td>
                                    <td>
                                        <form action="{{route('admin.pages.destroy',$page->id)}}" method="post">
                                            {!! @csrf_field() !!}
                                            @method('DELETE')
                                            <a href="{{route('admin.pages.edit',$page->id)}}" class="btn btn-info">Düzenle</a>
                                            <button onclick="return confirm('Emin misiniz ?')" class="btn btn-danger">Sil</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
@endsection
