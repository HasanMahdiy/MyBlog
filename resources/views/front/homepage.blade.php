@extends('front.layouts.master')
@section('title', 'Anasayfa')
@section('bg', 'https://www.ci.oceanside.ca.us/home/showpublishedimage/4122/638121630312070000')
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
