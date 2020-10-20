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
          <li class="list-group-item d-flex justify-content-between align-items-center border-0">
            <h4 class="mb-0">Редактирование новостей</h4>
            <a href="{{ route('admin.news.create') }}" class="btn btn-success ">Добавить</a>
          </li>
        </div>

        @forelse ($news as $item)
          <div class="card border-0 mt-2 mb-2">
            <li class="list-group-item border-0">
              <a href="{{ route('admin.news.edit', $item) }}">{{ $item->title }}</a>
              <form action="{{ route('admin.news.destroy', $item) }}" enctype="multipart/form-data" method="post">
                @method('DELETE')
                @csrf
                <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-success">Редактировать</a>
                <input type="submit" class="btn btn-danger" value="Удалить">
              </form>
            </li>
          </div>
        @empty
          Нет новостей
        @endforelse

        <div class="d-flex p-2 justify-content-center">
          {{ $news->links() }}
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection




