@extends('admin.layouts.admin')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sayfa Düzenleme</h4>
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form class="forms-sample" action="{{route('admin.pages.update',$pages->id)}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputName1">Başlık</label>
                        <input type="text" class="form-control" value="{{$pages->title , old('title') ?? ''}}"  id="exampleInputName1" name="title" placeholder="Başlık">
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Resim</label>
                        @if ($pages->image)
                            <img width="60" src="{{asset('images')}}/{{$pages->image ?? ''}}" style="border-radius: 50%;">
                        @endif
                        <input type="file" class="form-control" id="exampleInputName1" name="image">
                        @error('image')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">İçerik</label>
                        <textarea id="editor" class="form-control" style="height: 200px" name="content" cols="60" rows="10">{{$pages->content , old('content') ?? ''}}</textarea>
                        @error('content')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Slug</label>
                        <input type="text" class="form-control" value="{{$pages->slug , old('slug') ?? ''}}"  id="exampleInputName1" name="slug" placeholder="Slug">
                        @error('slug')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Order</label>
                        <input type="number" class="form-control" value="{{$pages->order , old('order') ?? ''}}"  id="exampleInputName1" name="order" placeholder="Order">
                        @error('order')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Göndermek</button>
                    <a href="{{route('admin.pages.index')}}" class="btn btn-warning">İptal Etmek</a>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        tinymce.init({
            selector: 'textarea#editor', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
@endsection

