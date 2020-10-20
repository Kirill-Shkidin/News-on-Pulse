@extends('layouts.app')

@section('title')
    @parentГлавная
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    @forelse ($data as $item)
        <a href="{{ route('news.one', $item->id) }}">{{ $item->title }}</a><br>
    @empty
        Нет новостей
    @endforelse
@endsection

