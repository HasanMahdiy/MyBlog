@extends('admin.layouts.admin')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nesne Ekleme</h4>
                <form class="forms-sample" action="{{route('admin.articles.store')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="exampleInputName1">Kategoriler</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('category') == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Başlık</label>
                        <input type="text" class="form-control" value="{{old('title') ?? ''}}"  id="exampleInputName1" name="title" placeholder="Başlık">
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Resim</label>
                        <input type="file" class="form-control" value="{{old('image') ?? ''}}" id="exampleInputName1" name="image" >
                        @error('image')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Slug</label>
                        <input type="text" class="form-control" value="{{old('slug') ?? ''}}" id="exampleInputName1" name="slug" >
                        @error('slug')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">İçerik</label>
                        <textarea class="form-control" style="height: 200px" id="editor" name="content" cols="60" rows="10">{{old('content') ?? ''}}</textarea>

                        @error('content')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Göndermek</button>
                    <a href="{{route('admin.articles.index')}}" class="btn btn-warning">İptal Etmek</a>
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
