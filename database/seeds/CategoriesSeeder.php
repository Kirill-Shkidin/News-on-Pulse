<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('categories')->insert($this->getData());
  }

  private function getData(): array
  {
    return [
      [
        'title' => 'О дивидендах',
        'slug' => 'dividends'
      ],
      [
        'title' => 'Об акциях',
        'slug' => 'shares'
      ],
      [
        'title' => 'Об облигациях',
        'slug' => 'bonds'
      ]
    ];
  }
}
