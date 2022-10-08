<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        return view('admin.allstudent.allstudents',[
            'studets'=> Student::all()
        ]);
    }


    public function create()
    {
        return view('students.infocreate');
    }


    public function store(Request $request)
    {
        Student::createStudent($request);
        return redirect()->back()->with('success','Information updated successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public $student;
    public function destroy($id)
    {
        $this->student = Student::find($id);
        if (file_exists($this->student->image)) {
            unlink($this->student->image);
        }
        $this->student->delete();
        return redirect()->back()->with('success', 'course deleted successfully');
    }
}
