@extends('front.layouts.master')
@section('title', $articles->title)
@section('bg', asset('images/' . $articles->image))
@section('content')
<!-- Main Content-->
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-9 col-xl-7">
                {!! $articles->content !!}
                <br> <br>
                <span class="text-danger">Okunma Sayısı: <b>{{$articles->hit}}</b></span>
            </div>
            @include('front.widgets.categoryWidget')
        </div>
@endsection
