<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Event;
use App\Models\Teacher;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $course = Course::all();
        $teacher = Teacher::all();

        return view('frontend.home.home',[
            'courses' => $course,
            'teachers' => $teacher,

        ]);
    }


    public function all_courses()
    {

        $course = Course::all();

        return view('frontend.allcourses.courses',[
            'courses' => $course,
        ]);
    }
    public function about()
    {
        return view('frontend.about.about');
    }

    public function details($id)
    {
        return view('frontend.details.single',[
            'course' => Course::find($id)
        ]);
    }


    public function trainers()
    {
        $teacher = Teacher::all();
        return view('frontend.trainers.trainers',[
            'teachers' => $teacher,
        ]);
    }

    public function events()
    {


        return view('frontend.events.events',[
            'events' => Event::all(),
        ]);
    }


    public function enrollnow($id)
    {
        return $id;
    }

}
