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
          <div class="card-header d-flex justify-content-between align-items-center">Редактирование пользователей
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Добавить</a>
          </div>
          <ul class="list-group list-group-flush">
            @forelse ($users as $item)
              <li class="list-group-item">
                <a href="{{ route('admin.users.edit', $item) }}">{{ $item->name }} {{ $item->email }}</a>
                <form action="{{ route('admin.users.destroy', $item) }}" enctype="multipart/form-data" method="post">
                  @method('DELETE')
                  @csrf
                  <a href="{{ route('admin.users.edit', $item) }}" class="btn btn-success">Редактировать</a>
                  <input type="submit" class="btn btn-danger" value="Удалить">

                  @if($item->status)
                    <a href="{{ route('admin.toggleAdmin', $item) }}" class="btn btn-danger">Лешить прав админа</a>
                  @else
                    <a href="{{ route('admin.toggleAdmin', $item) }}" class="btn btn-success">Сделать админом</a>
                  @endif
                </form>
              </li>
            @empty
              Нет пользователей
            @endforelse

          </ul>

        </div>
        <div class="d-flex p-2 justify-content-center">
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection




