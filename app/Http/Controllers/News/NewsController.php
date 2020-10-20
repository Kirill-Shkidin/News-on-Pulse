<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
  public function index()
  {
    return view('news.index')->with(['news' => News::query()->paginate(config('app.newsPaginateValue'))]);
  }

  public function show(News $news)
  {
    return view('news.one')->with('news', $news);
  }
}
