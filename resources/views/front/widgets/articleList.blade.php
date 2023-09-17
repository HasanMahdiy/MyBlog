@if(count($articles)>0)
@foreach($articles as $item)
    <div class="post-preview">
        <a href="{{route('single', $item->slug)}}">
            <h2 class="post-title">
                {{Str::limit($item->title, 40)}}
            </h2>
            <img src="{{asset('images')}}/{{$item->image ?? ''}}" width=100%>
            <h3 class="post-subtitle">
                {!! Str::limit($item->content,75) !!}
            </h3>
        </a>
        <p class="post-meta">
            <a href="#!">{{$item->category->name}}</a>
            <span class="float-end">{{$item->category->created_at}}</span>
        </p>
    </div>
    @if(!$loop->last)
        <hr class="my-4" />
    @endif
@endforeach
<div class="d-flex justify-content-center">
    {{$articles->links('pagination::simple-bootstrap-4')}}
</div>
@else
    <div class="alert alert-danger">
        <h2>Bu Kategoriye ait yazı bulunamadı</h2>
    </div>

@endif
