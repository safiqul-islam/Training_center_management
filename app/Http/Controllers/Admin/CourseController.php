<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\User;

class CourseController extends Controller
{
    private $course, $courses, $user;

    public function index()
    {

        if (auth()->user()->role == 2)
        {
            $this->courses = Course::latest()->get();

        }elseif (auth()->user()->role == 1)
        {
            $this->courses = Course::where('user_id', auth()->id())->latest()->get();
        }

        return view('admin.courses.index',[
            'courses'=> $this->courses,
        ]);
    }


    public function create()
    {
        return view('admin.courses.create');
    }


    public function store(Request $request)
    {


//        Course::createOrUpdateCourse($request);
        Course::createCourse($request);
        return redirect()->back()->with('success','Course created successfully');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        Course::find($id);

        return view('admin.courses.edit',[
            'course'=>Course::find($id),
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->course = Course::find($id);
        Course::createOrUpdateTeacher($request,$this->user->id,$id);

//        Course::updateCourse($request,$id);
        return redirect('/courses')->with('success','Course Updated successfully');
    }


    public function destroy($id)
    {
        $this->course = Course::find($id);
        if (file_exists($this->course->image))
        {
            unlink($this->course->image);
        }
        $this->course->delete();
        return redirect()->back()->with('success','course deleted successfully');
    }

    public function changeStatus($id)
    {
        $this->course = Course::find($id);
        if ($this->course->status ==1)
        {
            $this->course->status =0;
        }elseif ($this->course->status ==0)
        {
            $this->course->status =1;
        }
        $this->course->save();
        return redirect()->back()->with('success','Course status changed successfully.');
    }

}
