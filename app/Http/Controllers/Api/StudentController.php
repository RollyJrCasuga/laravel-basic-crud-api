<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' => 'required',
            'section_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'photo' => 'required',
            'gender' => 'required',
        ]);

        Student::insert([
            'class_id' => $request->class_id,
            'section_id' => $request->class_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
            'gender' => $request->gender,
            'created_at' => Carbon::now(),
        ]);

        return response('Student Inserted Successfully!');
    }

    public function edit($id)
    {
        $student = Student::findOrfail($id);
        return response()->json($student);
    }


    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'class_id' => 'required',
            'section_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'photo' => 'required',
            'gender' => 'required',
        ]);

        Student::findOrfail($id)->update([
            'class_id' => $request->class_id,
            'section_id' => $request->class_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
            'gender' => $request->gender,
        ]);
        return response('Student Updated Successfully!');
    }

    public function destroy($id)
    {
        Student::findOrfail($id)->delete();
        return response('Student Deleted Successfully!');
    }
}
