<?php

namespace App\Http\Controllers\News;

use App\Categories;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
  public function index()
  {
    return view('news.categories.index')->with('data', Categories::query()->paginate(5));
  }

  public function showCategory($slug)
  {
    return view('news.categories.one')->with('data', Categories::query()->where('slug', $slug)->first()->news);
  }
}
