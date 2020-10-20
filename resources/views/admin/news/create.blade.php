@extends('layouts.app')

@section('title', 'Добавление новости')


@section('menu')
  @include('admin.menu')
@endsection

{{--@dd($news->title)--}}

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">{{ __('Добавление новости') }}</div>
          <form action="@if($news->id){{ route('admin.news.update', $news) }}
          @else{{route('admin.news.store', $news) }}@endif"
                method="post">
            @csrf
            @if($news->id) @method('PUT') @endif

            <div class="form-group row mt-4">
              <label for="newsTitle"
                     class="col-md-4 col-form-label text-md-right">{{ __('Заголовок новости') }}</label>

              <div class="col-md-6">
                <input id="newsTitle" type="text" class="form-control" name="title"
                       value="{{old('title') ?? $news->title }}">


                @if ($errors->has('title'))
                  <div class="alert alert-danger mt-1" role="alert">
                    @foreach($errors->get('title') as $error)
                      {{ $error }}
                    @endforeach
                  </div>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="newsCategory"
                     class="col-md-4 col-form-label text-md-right">{{ __('Категория новости') }}</label>
              <div class="col-md-6">
                <select name="category" id="newsCategory" class="form-control">
                  @forelse($categories as $item)
                    <option @if($item->id == old('category')) selected
                            @endif value="{{$item->id }}">{{ $item->title }}</option>
                    @if ($errors->has('category_id'))
                      <div class="alert alert-danger" role="alert">
                        @foreach ($errors->get('category_id') as $error)
                          {{ $error }}
                        @endforeach
                      </div>
                    @endif
                  @empty
                    <option value="null" selected>Нет категорий</option>
                  @endforelse
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="newsText"
                     class="col-md-4 col-form-label text-md-right">{{ __('Текст новости') }}</label>
              <div class="col-md-6">
                {{--                <textarea name="text" id="newsText" cols="30" rows="10"--}}
                {{--                          class="form-control">{{old('text') ?? $news->text }}</textarea>--}}
                <textarea id="my-editor" name="content" rows="7"
                          class="form-control">{!! old('text') ?? $news->text !!}</textarea>
                @if ($errors->has('text'))
                  <div class="alert alert-danger mt-1" role="alert">
                    @foreach ($errors->get('text') as $error)
                      {{ $error }}
                    @endforeach
                  </div>
                @endif
              </div>
            </div>

            <div class="form-group row mb-4">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  @if($news->id)
                    Сохранить
                  @else
                    Добавить новость
                  @endif
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
  </script>
  <script>
    CKEDITOR.replace('my-editor', options);
  </script>
@endsection
