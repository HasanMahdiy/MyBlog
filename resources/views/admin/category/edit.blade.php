@extends('admin.layouts.admin')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kategori Düzenle</h4>
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form class="forms-sample" action="{{route('admin.category.update', $category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputName1">Adı</label>
                        <input type="text" class="form-control" value="{{$category->name , old('name') ?? ''}}"  id="exampleInputName1" name="name" placeholder="Adı">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Slug</label>
                        <input type="text" class="form-control" value="{{$category->slug , old('slug') ?? ''}}"  id="exampleInputSlug" name="slug" placeholder="Slug">
                        @error('slug')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Göndermek</button>
                    <a href="{{route('admin.category.index')}}" class="btn btn-warning">İptal Etmek</a>
                </form>
            </div>
        </div>
    </div>
@endsection
