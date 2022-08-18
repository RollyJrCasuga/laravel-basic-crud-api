<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Carbon\Carbon;


class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        return response()->json($sections);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'class_id' => 'required',
            'name' => 'required|unique:sections|max:25',
        ]);

        Section::insert([
            'class_id' => $request->class_id,
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        return response('Student Section Inserted Successfully!');
    }

    public function edit($id)
    {
        $section = Section::findOrfail($id);
        return response()->json($section);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'class_id' => 'required',
            'name' => 'required|unique:sections|max:24',
        ]);

        Section::findOrfail($id)->update([
            'class_id' => $request->class_id,
            'name' => $request->name,
        ]);

        return response('Student Section Updated Successfully!');
    }

    public function destroy($id)
    {
        Section::findOrfail($id)->delete();
        return response('Student Section Deleted Successfully!');
    }
}
