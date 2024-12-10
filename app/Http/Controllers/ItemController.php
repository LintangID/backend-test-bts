<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index($checklistId){
        $item = Item::where('checklistId', $checklistId)->get();
        return ItemResource::collection($item);
    }

    public function store(Request $request, $checklistId)
    {
        $validatedData = $request->validate([
            'itemName' => 'required',
            'status' => 'required'
        ]
        );

        $validatedData['checklistId'] = $checklistId;

        Item::create($validatedData);
        $checklist = Item::all();
        return response()->json('berhasil ditambahkan');

    }

    public function show($checklistId,$id){
        $item = Item::where('checklistId', $checklistId)->where('id', $id)->get();
        return ItemResource::collection($item);
    }

    public function update(Request $request, $checklistId,$id){
        $validatedData = $request->validate([
            'status' => 'required'
        ]
        );
        $item = Item::where('checklistId', $checklistId)->where('id', $id)->first();
        $item->update($validatedData);
        return response()->json('berhasil diupdate');
    }

    public function destroy($checklistId,$id)
    {
        $item = Item::where('checklistId', $checklistId)->where('id', $id)->first();
        $item->delete();
        return response()->json('berhasil dihapus');
    }

    public function rename(Request $request, $checklistId,$id){
        $validatedData = $request->validate([
            'itemName' => 'required'
            ]
        );
        $item = Item::where('checklistId', $checklistId)->where('id', $id)->first();
        $item->update($validatedData);
        return response()->json('berhasil diupdate');
    }
}
