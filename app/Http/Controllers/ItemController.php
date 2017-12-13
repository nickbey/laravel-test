<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
  public function index()
  {
    return $this->getPage(0);
  }

  private function getPage($error)
  {
    $items = Item::select(
      '*',
      DB::raw('items.price_per_item * items.quantity_in_stock as total_value')
    )
      ->orderBy('created_at', 'desc')
      ->get()
      ->toArray();

    $whole_value = Item::select(
      DB::raw('SUM(items.price_per_item * items.quantity_in_stock) as whole_value')
    )
      ->groupBy()
      ->first()->toArray();

    return view('item')->with(['items' => $items, 'error' => $error, 'whole_value' => $whole_value['whole_value']]);
  }

  public function addItem(Request $request)
  {
    $data = $request->all();

    if (!$data['product_name'] || !$data['quantity_in_stock'] || !$data['price_per_item']) {
      return $this->getPage(1);
    }

    $item = Item::create([
      'product_name' => $data['product_name'],
      'quantity_in_stock' => $data['quantity_in_stock'],
      'price_per_item' => $data['price_per_item'],
    ]);

    Storage::put(date('YYYY-mm-dd') . '_' . rand(1, 1000) . $data['product_name'] . '.json', json_encode($item->toArray()));

    return $this->getPage(0);
  }
}
