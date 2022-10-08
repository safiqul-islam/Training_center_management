<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TeacherController extends Controller
{

    private $teacher,$user,$teachers;

    public function index()
    {

        return view('admin.teachers.index',[
           'teachers'=>Teacher::latest()->get(),
        ]);
    }


    public function create()
    {
        return view('admin.teachers.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'phone'=>'required',
            'address'=>'required',
            'description'=>'required',
            'status'=>'required',
        ],[
            'image.required'=>'Field can not be empty',
            'image.image'=>'image format is not supported'
        ]);

        $this->user = User::createTeachersAccount($request);
        $this->teacher = Teacher::createOrUpdateTeacher($request,$this->user->id);

//        $data = [
//            'user'=>$this->user,
//            'teacher'=>$this->teacher,
//        ];
//
//
//        Mail::send('admin.teachers.mail', $data,function ($message) use ($data){
//
//            $message->to($data['user']->email, $data['user']->name)->subject(" Teacher's Account Information");
//        });

        return redirect()->back()->with('success','Teacher created successfully');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        return view('admin.teachers.edit',[
            'teacher'=>Teacher::find($id)
        ]);
    }


    public function update(Request $request, $id)
    {

        $this->teacher = Teacher::find($id);
        $this->user     = User::updateTeacher($request,$this->teacher->user_id);
        Teacher::createOrUpdateTeacher($request,$this->user->id,$id);


        return redirect()->back()->with('success','Teacher Updated successfully');
    }


    public function destroy($id)
    {
        $this->teacher = Teacher::find($id);

        $this->user = User::find($this->teacher->user_id);
        $this->user->delete();

        if (file_exists($this->teacher->image))
        {
            unlink($this->teacher->image);
        }

        $this->teacher->delete();
        return redirect()->back()->with('success','Teacher deleted successfully');
    }
}
