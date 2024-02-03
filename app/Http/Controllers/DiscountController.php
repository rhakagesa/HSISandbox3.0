<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DiscountController extends Controller
{
    //
    public function index(){
        $title = "Set Discount Page";
        $discount = Discount::all();

        return view('admin/master/discount/discount', [
            'title' => $title,
            'discount' => $discount]);
    }

    public function update(Request $request, string $id)
    {
        Discount::where('id',$id)->where('id',$id)->update([
            'shipping_total' => $request->shipping_total,
            'item_discount' => $request->item_discount,
        ]);
        
        Alert::success('Success', 'setting discount success!');
        return redirect('/discount');
    }

}
