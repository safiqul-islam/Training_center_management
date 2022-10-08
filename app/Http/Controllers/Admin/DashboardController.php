<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AllEnroll;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function dashboard()
    {
        if (auth()->user()->role == 2 )
        {
            return view('admin.dashboard.dashboard');

        }elseif (auth()->user()->role == 1)
        {
            return view('admin.dashboard.dashboard');
        }
        else
        {



            return view('students.studentsprofile',[
                'student'=>Student::where('user_id',auth()->id())->get(),
                'allenroll'=>AllEnroll::where('user_id',auth()->id())->get()

            ]);
        }

    }
}
