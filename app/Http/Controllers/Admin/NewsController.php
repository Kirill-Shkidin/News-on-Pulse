<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
  public function index()
  {
    return view('admin.news.index')->with(['news' => News::query()->paginate(config('app.newsPaginateValue'))]);
  }

  public function create(News $news)
  {
    return view('admin.news.create', ['categories' => Categories::query()->get(), 'news' => $news]);
  }

  public function edit(News $news)
  {
    return view('admin.news.create', ['categories' => Categories::query()->get(), 'news' => $news]);
  }

  public function update(Request $request, News $news)
  {
    $this->validate($request, News::rules(), [], News::attrNames());

    $data = $request->except('_token');
    $data['image'] = $this->saveImage($request);

    $result = $news->fill($data)->save();

    if ($result) {
      return redirect()->route('admin.news.create')->with('success', 'Новость добавлена успешно!');
    } else {
      return redirect()->route('admin.news.create')->with('error', 'Ошибка добавления новости!');
    }
  }

  public function destroy(News $news)
  {
    $news->delete();
    return redirect()->route('admin.news.index');
  }

  public function store(Request $request, News $news)
  {
    $this->validate($request, News::rules(), [], News::attrNames());
    $result = $news->fill($request->except('_token'))->save();

    if ($result) {
      return redirect()->route('admin.news.create')->with('success', 'Новость добавлена успешно!');
    } else {
      return redirect()->route('admin.news.create')->with('error', 'Ошибка добавления новости!');
    }
  }

  protected function saveImage(Request $request) {
    $name = null;
    if ($request->file('image')) {
      $path = \Storage::putFile('public/images', $request->file('image'));
      $name = \Storage::url($path);
    }
    return $name;
  }
}
