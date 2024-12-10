<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChecklistResource;
use App\Models\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function index(){
        $checklist = Checklist::all();
        return ChecklistResource::collection($checklist);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]
        );

        Checklist::create($validatedData);
        $checklist = Checklist::all();
        return response()->json('berhasil ditambahkan');

    }

    public function destroy($id)
    {
        $checklist = Checklist::find($id);
        $checklist->delete();
        return response()->json('berhasil dihapus');
    }
}
