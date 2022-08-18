<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return response()->json($subjects);
    }
  
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'class_id' => 'required',
            'name' => 'required|unique:subjects|max:25'
            
        ]);

        Subject::insert([
            'class_id' => $request->class_id,
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return response('Student Subject Inserted Successfully!');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return response()->json($subject);
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'class_id' => 'required',
            'name' => 'required|unique:subjects|max:25'
        ]);

        Subject::findOrfail($id)->update([
            'class_id' => $request->class_id,
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return response('Student Subject Updated Successfully!');
    }

    public function destroy($id)
    {
        Subject::findOrFail($id)->delete();
        return response('Student Subject Deleted Successfully');
    }
}
