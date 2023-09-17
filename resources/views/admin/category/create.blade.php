@extends('admin.layouts.admin')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic form elements</h4>
                <p class="card-description">
                    Basic form elements
                </p>
                <form class="forms-sample" action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Adı</label>
                        <input type="text" class="form-control" value="{{old('name') ?? ''}}"  id="exampleInputName1" name="name" placeholder="Adı">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Slug</label>
                        <input type="text" class="form-control" value="{{old('slug') ?? ''}}"  id="exampleInputSlug" name="slug" placeholder="Slug">
                        @error('slug')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Göndermek</button>
                    <a href="{{route('admin.category.index')}}" class="btn btn-warning">
                        İptal Etmek</a>
                </form>
            </div>
        </div>
    </div>
@endsection
