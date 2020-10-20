@extends('layouts.app')

@section('title')
    @parent Категории
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    @if($news)
        <h1>{{ $news->title }}</h1>
        <p>{{ $news->text }}</p>
    @else
        <h1>Извините</h1>
        <p>Такой новости нет;(</p>
    @endif
@endsection
