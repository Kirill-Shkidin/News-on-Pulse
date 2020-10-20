@extends('layouts.app')

@section('title')
  @parent Новости
@endsection

@section('menu')
  @include('menu')
@endsection

{{--@dd($news)--}}

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @forelse ($news as $item)
          {{--          @dump($item)--}}
          <a href="{{ route('news.one', $item->id) }}" class="btn p-0 mb-1">
            <div class="card border-0">
              <li class="list-group-item border-0">
                <div class="row">
                  <div class="col-6">
                    <img src="{{ $item->image }}" alt="" class="rounded">
                  </div>
                  <div class="col-6">
                    <h5 class="pt-1">{{ $item->title }}</h5>
                    <p>{{ $item->text }}</p>
                  </div>
                </div>
              </li>
            </div>
          </a>
        @empty
          <div class="card border-0 m-1 p-1">
            Нет новостей
          </div>
        @endforelse
        <div class="d-flex p-2 justify-content-center">
          {{ $news->links() }}
        </div>
      </div>
    </div>
  </div>

@endsection
