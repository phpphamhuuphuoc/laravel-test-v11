@extends('frontend.layout')

@section('content')

    @if (!empty($modules) and $page->top_position)
    @foreach ($modules as $item)
        @include('frontend.modules.' . Str::ucfirst(Str::camel($item->title_admin)) . "_" . $item->id)
    @endforeach
    @endif





    @if (!empty($modules) and !$page->top_position)
    @foreach ($modules as $item)
        @include('frontend.modules.' . Str::ucfirst(Str::camel($item->title_admin)) . "_" . $item->id)
    @endforeach
    @endif
@endsection