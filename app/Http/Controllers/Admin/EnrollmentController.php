<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AllEnroll;

class EnrollmentController extends Controller
{


    public function index()
    {
        $allenroll = AllEnroll::all();

        return view('admin.enrollments.enrollments',[
            'allenrolls' => $allenroll
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

       $enroll = AllEnroll::where(['user_id' => auth()->id() , 'course_id' => $request->id] )->get();

       if (sizeof($enroll) == 0) {

        AllEnroll::createEnroll($request);
            return redirect('dashboard')->with('success','Course Enrolled successfully');
        
            
       }else
        {
            return redirect('dashboard')->with('success','Already Enrolled ');
        }

    }


    public function show($id)
    {

        return $id;
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
       $enroll = AllEnroll::find($id);
       $enroll->delete();
       return redirect('dashboard')->with('success',' Enroll deleted successfully');
    }
}
