<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\News;

use App\Services\XMLParserService;
use App\Categories;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
  public function index()
  {
//     $start = date('c');

    $rssLinks = [
      'https://lenta.ru/rss/news',
      'https://news.yandex.ru/auto.rss',
      'https://news.yandex.ru/auto_racing.rss',
      'https://news.yandex.ru/army.rss',
      'https://news.yandex.ru/gadgets.rss',
      'https://news.yandex.ru/index.rss',
      'https://news.yandex.ru/martial_arts.rss',
      'https://news.yandex.ru/communal.rss',
      'https://news.yandex.ru/health.rss',
      'https://news.yandex.ru/games.rss',
      'https://news.yandex.ru/internet.rss',
      'https://news.yandex.ru/cyber_sport.rss',
      'https://news.yandex.ru/movies.rss',
      'https://news.yandex.ru/cosmos.rss',
      'https://news.yandex.ru/culture.rss',
      // 'https://news.yandex.ru/fire.rss',
      'https://news.yandex.ru/championsleague.rss',
      'https://news.yandex.ru/music.rss',
      'https://news.yandex.ru/nhl.rss',

    ];


//    $xml = XmlParser::load('https://lenta.ru/rss/news');
//    $data = $xml->parse([
//      'title' => ['uses' => 'channel.title'],
//      'link' => ['uses' => 'channel.link'],
//      'description' => ['uses' => 'channel.description'],
//      'image' => ['uses' => 'channel.image.url'],
//      'news' => ['uses' => 'channel.item[guid,title,link,description,category,pubDate,enclosure::url,category]']
//    ]);
//
//    foreach ($data['news'] as $news) {
//      if ($news['category']) {
//        $category = Categories::query()->firstOrCreate([
//          'title' => $news['category'],
//          'slug' => Str::slug($news['category'])
//        ]);
//        dump($news['enclosure::url']);
//        News::query()->firstOrCreate([
//          'title' => $news['title'],
//          'text' => $news['description'],
//          'image' => $news['enclosure::url'],
//          'category' => $category->id,
//        ]);
//        dd(News::all());
//      }
//    }

    foreach ($rssLinks as $rssLink) {
      NewsParsing::dispatch($rssLink);
    }

//     return $start . ' --- ' . date('c');
    //return view('admin.index');
    return redirect()->route('admin.news.index');
  }
}
