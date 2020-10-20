<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NewsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('news')->insert($this->getData());
  }

  private function getData(): array
  {
    $data = [
      [
        'title' => 'Правительство предложило снизить размер дивидендов ВТБ в пять раз',
        'category' => 1,
        'text' => 'Вместо 50% чистой прибыли банк может перечислить акционерам 10%, следует из распоряжения правительства. Ранее топ-менеджмент ВТБ допускал смягчение условий выплаты дивидендов из-за кризиса и пандемии'
      ],
      [
        'title' => 'Рынок акций Московской биржи по состоянию на 13:00 мск 11 августа растет',
        'category' => 2,
        'text' => 'Индекс Мосбиржи продолжает расти. По состоянию на 13:00 мск индекс Мосбиржи повысился на 35,53 пункта (1,2%) по сравнению с закрытием предыдущего торгового дня и составляет 2996,31'
      ],
      [
        'title' => 'Мальта и Люксембург согласились повысить налог на капитал из России',
        'category' => 1,
        'text' => 'Обе страны приняли предложение Минфина поднять ставки на дивиденды и проценты из России до максимума. Переговоры с Кипром продолжатся, несмотря на заявление России о начале денонсации налогового соглашения'],
      [
        'title' => 'Европейские рынки акций растут на фоне надежд на принятие новых стимулов в США',
        'category' => 2,
        'text' => 'Сегодня европейские фондовые индексы уверенно повышаются, инвесторы продолжают следить за процессом принятия нового пакета мер поддержки экономики США.'
      ]
    ];

    $faker = Faker\Factory::create('ru_RU');

    for ($i = 0; $i < 10; $i++) {
      $data[] = [
        'title' => $faker->realText(rand(30, 70)),
        'text' => $faker->realText(rand(300, 500)),
        'category' => rand(1, 2),
      ];
    }
    return $data;
  }

}