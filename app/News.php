<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
   // protected $timestamps = true;
   protected $fillable = ['title','text','category', 'image'];

  public static function rules()
  {
    $tableNameCategory = (new Categories())->getTable();
    return [
      'title' => ['required', 'min:3', 'max:20'],
      'text' => 'required|min:3',
      'category' => "required|exists:{$tableNameCategory},id"
    ];

  }

  public static function attrNames() {
    return [
      'title' => 'Заголовок новости',
      'text' => 'Текст новости',
      'category' => "Категория новости",
      'img' => "Изображение"
    ];
  }
}
