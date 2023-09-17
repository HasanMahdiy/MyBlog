@extends('front.layouts.master')
@section('title', 'iletisim')
@section('bg','https://www.ayasandra.com/menuis/ayasandra-iletisim.jpg' )
@section('content')
    <div class="col-md-8 col-lg-8 mx-auto">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <p class="text-center">Bizimle iletişime geçebilirsiniz.</p>
        <div class="my-5">
            <form action="{{route('contact.post')}}"  method="post" enctype="multipart/form-data" data-sb-form-api-token="API_TOKEN">
                {!! csrf_field() !!}
                <div class="control-group">
                    <div class="form-group controls">
                        <label for="name">Ad Soyad</label>
                    <input class="form-control" name="name" type="text" value="{{ old('name') ?? '' }}" placeholder="Ad Soyadınız" data-sb-validations="required" />
                        @error('name')
                        <p class="help-block text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group controls">
                        <label for="email">Email Adresi</label>
                    <input class="form-control" name="email"value="{{ old('email') ?? '' }}" type="email" placeholder="Email Adresiniz"/>
                        @error('email')
                        <p class="help-block text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group controls">
                    <label for="phone">Konu</label>
                        <input class="form-control" name="topic" value="{{ old('topic') ?? '' }}" type="text" placeholder="Sorun Yaşadığınız Konu"/>
                        @error('topic')
                        <p class="help-block text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group controls">
                        <label for="message">Message</label>
                    <textarea class="form-control" id="message" value="{{ old('message') ?? '' }}" name="message" placeholder="Mesajınız" style="height: 12rem"></textarea>
                        @error('message')
                        <p class="help-block text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary text-uppercase" type="submit">Gönder</button>
            </form>
        </div>
    </div>
@endsection
