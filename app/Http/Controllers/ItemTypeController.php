<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemType;
use RealRashid\SweetAlert\Facades\Alert;

class ItemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $title = "Item Type Page";
        $itemTypeData = ItemType::all();

        return view('admin/master/itemtype/itemtype', [
            'title' => $title,
            'itemTypeData' => $itemTypeData]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ItemType::create([
            'name_item_type' => $request->name_item_type,
        ]);
        Alert::success('Item Type Created', 'creating item type success!');
        return redirect('/itemtype');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ItemType::where('id',$id)->where('id',$id)->update([
            'name_item_type' => $request->name_item_type,
        ]);
        
        Alert::success('Item Type Updated', 'updating item type success!');
        return redirect('/itemtype');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $itemTypeTarget = ItemType::find($id);

        if(!$itemTypeTarget){
            Alert::warning('Item Type Not Found', 'item type not found!');
            return redirect('/itemtype');            
        } 
        else {
            $itemTypeTarget->delete();
            Alert::success('Item Type Removed', 'removing item type success!');
            return redirect('/itemtype');            
        }
    }
}
