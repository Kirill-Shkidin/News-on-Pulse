@extends('layouts.app')

@section('title', 'Admin')

@section('menu')
  @include('admin/menu')
@endsection

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">Парсинг новостей
            <a href="{{ route('admin.news.create') }}" class="btn btn-success ">Добавить</a>
          </div>
          <ul class="list-group list-group-flush">

            @forelse ($news as $item)
              <li class="list-group-item">
                <a href="">{{ $item->title }}</a>
                <form action="" enctype="multipart/form-data" method="post">

                  @csrf
{{--                  @dd($item)--}}
                  <a href="{{ route('admin.news.create') }}" class="btn btn-success">Добавить</a>
                </form>
              </li>
            @empty
              Нет новостей
            @endforelse

          </ul>

        </div>
        <div class="d-flex p-2 justify-content-center">
{{--          {{ $news->links() }}--}}
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection




