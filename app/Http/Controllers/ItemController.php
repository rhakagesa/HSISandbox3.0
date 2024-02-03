<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemType;
use RealRashid\SweetAlert\Facades\Alert;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = array(
            'title' => "Item Page",
            'itemTypeData' => ItemType::all(),
            'itemData' => Item::join('item_type', 'item_type.id', '=', 'items.item_type_id')
                        ->select('items.*', 'item_type.name_item_type')
                        ->get()
        );
                        
        return view('admin/master/item/item', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Item::create([
            'item_name' => $request->item_name,
            'item_type_id' => $request->item_type_id,
            'item_price' => $request->item_price,
            'stocks' => $request->stocks,
        ]);
        Alert::success('Item Created', 'creating new item success!');
        return redirect('/item');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        Item::where('id',$id)->where('id',$id)->update([
            'item_type_id' => $request->item_type_id,
            'item_name' => $request->item_name,
            'item_price' => $request->item_price,
            'stocks' => $request->stocks,
        ]);
        Alert::success('Item Updated', 'updating item success!');
        return redirect('/item');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $itemTarget = Item::find($id);

        if(!$itemTarget){
            Alert::warning('Item Not Found', 'item not found!');
            return redirect('/item');            
        } 
        else {
            $itemTarget->delete();
            Alert::success('Item Removed', 'removing item success!');
            return redirect('/item');            
        }
    }
}
