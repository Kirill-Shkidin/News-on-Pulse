<?php


namespace App\Services;

use App\Categories;
use App\News;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class XMLParserService
{
  public function saveNews($link)
  {
    $xml = XmlParser::load($link);
    $data = $xml->parse([
      'title' => ['uses' => 'channel.title'],
      'link' => ['uses' => 'channel.link'],
      'description' => ['uses' => 'channel.description'],
      'image' => ['uses' => 'channel.image.url'],
      'news' => ['uses' => 'channel.item[guid,title,link,description,category,pubDate,enclosure::url,category]']
    ]);

    foreach ($data['news'] as $news) {
      if ($news['category']) {
        $category = Categories::query()->firstOrCreate([
          'title' => $news['category'],
          'slug' => Str::slug($news['category'])
        ]);

        News::query()->firstOrCreate([
          'title' => $news['title'],
          'text' => $news['description'],
          'image' => $news['enclosure::url'],
          'category' => $category->id,
        ]);
      }
    }
  }
}
