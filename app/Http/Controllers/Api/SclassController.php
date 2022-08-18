<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sclass;

class SclassController extends Controller
{
    public function index()
    {
        $class = Sclass::get();
        return response()->json($class);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:sclasses|max:25'
        ]);

        Sclass::insert([
            'name' => $request->name,
        ]);

        return response('Student Class Inserted Successfully!');
    }

    public function edit($id)
    {
        $sclass = Sclass::findOrFail($id);
        return response()->json($sclass);
    }

    //Store or Update (to be done)
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:sclasses|max:25'
        ]);

        $update = Sclass::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        return response('Student Class Updated Successfully!');
    }

    public function destroy($id)
    {
        $delete = Sclass::findOrFail($id)->delete();
        return response('Student Class Deleted Successfully!');
    }
}
