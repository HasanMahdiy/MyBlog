@extends('front.layouts.master')
@section('title', $page->title)
@section('bg', asset('images/' . $page->image))
@section('content')
<!-- Main Content-->
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        <p class="lh-base">{!! $page->content !!}</p>
    </div>
</div>
@endsection

