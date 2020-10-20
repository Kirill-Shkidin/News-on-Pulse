@extends('layouts.app')

@section('title', 'Категории новостей')

@section('menu')
  @include('menu')
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Категории новостей</div>

          @if($data)
            <ul class="list-group list-group-flush">
              @forelse ($data as $item)
                <li class="list-group-item">
                  <a href="{{ route('news.categories.one', $item->slug) }}">{{ $item->title }}</a><br>
                </li>
              @empty
                Нет категорий
              @endforelse
            </ul>
          @else
            <h1>Извините</h1>
            <p>Такой категории нет;(</p>
          @endif
        </div>
        <div class="d-flex p-2 justify-content-center">
          {{ $data->links() }}
        </div>
      </div>
    </div>
  </div>

@endsection
