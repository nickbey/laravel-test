<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i = 1; $i <= 100; $i++) {
      \App\Item::create([
        'product_name' => 'Name '.$i,
        'quantity_in_stock' => $i+100,
        'price_per_item' => $i+200
      ]);
    }
  }
}
