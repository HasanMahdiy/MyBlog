@extends('front.layouts.master')
@section('title', $category->name. ' Kategorisi |'. count($articles). ' yazı bulundu.')
@section('bg', 'https://static6.depositphotos.com/1003264/539/i/450/depositphotos_5399216-stock-photo-alphabetical-filing-tray.jpg')
@section('content')
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-9 col-xl-7">
            @include('front.widgets.articleList')
        </div>
        @include('front.widgets.categoryWidget')
    </div>
</div>
@endsection

