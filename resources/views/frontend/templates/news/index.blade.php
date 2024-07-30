@extends('frontend.layout')

@section('content')
    @if (!empty($modules) and $page->top_position)
    @foreach ($modules as $item)
        @include('frontend.modules.' . Str::ucfirst(Str::camel($item->title_admin)) . "_" . $item->id)
    @endforeach
    @endif


    @if ($page->handle_id == 4)
        <h2 style="display: none">Danh sách bài viết</h2>
        @include('frontend.templates.news.type.post')


    @elseif($page->handle_id == 3)
        <h2 style="display: none">Danh sách dịch vụ</h2>


    @else

    
    @endif




    @if (!empty($modules) and !$page->top_position)
    @foreach ($modules as $item)
        @include('frontend.modules.' . Str::ucfirst(Str::camel($item->title_admin)) . "_" . $item->id)
    @endforeach
    @endif

@endsection