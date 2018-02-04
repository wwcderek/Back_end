<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    //

  public function getDiscount(Request $request)
  {
      $user_id = $request->user_id;
      $now = date('Y-m-d H:i:s');
      $record = DB::table('user_has_discount')
          ->select('user_has_discount.user_has_discount_id', 'user_has_discount.user_id', 'user_has_discount.discount_id','user_has_discount.created_at','user_has_discount.path', 'user_has_discount.expired_time','discounts.type')
          ->join('discounts', 'discounts.discount_id', '=', 'user_has_discount.discount_id')
          ->where([
              ['user_has_discount.user_id', '=', $user_id],
              ['user_has_discount.expired_time', '>', $now]
          ])
          ->get();
      if(count($record) > 0)
          return json_encode($record);
      return json_encode(false);
  }



}
