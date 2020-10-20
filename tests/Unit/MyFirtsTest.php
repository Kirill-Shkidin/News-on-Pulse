<?php

namespace Tests\Unit;

use App\Category;
use App\News;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MyFirtsTest extends TestCase
{
  /**
   * A basic unit test example.
   *
   * @return void
   */
  public function testExample()
  {
    $this->assertTrue(true);
    $this->assertArrayHasKey('0', News::getNews());
    $this->assertArrayNotHasKey('id', News::getNews());
    $this->assertEquals('0', Category::getNewsCategoryIdByTitle('dividends'));
  }
}
