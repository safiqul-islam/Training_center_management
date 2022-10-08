<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;


class EventController extends Controller
{

    public $event;

    public function index()
    {

        return view('admin.events.index',[
            'allEvents' => Event::all()
        ]);
    }


    public function create()
    {
       return view('admin.events.create');
    }


    public function store(Request $request)
    {

        $this->event = Event::createOrUpdateEvent($request);
        return redirect()->back()->with('success','Event created successfully');

//
//       Event::createEvent($request);
//       return redirect()->back()->with('success','Event created successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        return view('admin.events.edit',[
            'course'=>Event::find($id),
        ]);
    }


    public function update(Request $request, $id)
    {
        Event::createOrUpdateEvent($request,$id);
        return redirect()->back()->with('success','Event Updated successfully');

    }


    public function destroy($id)
    {
        $this->event = Event::find($id);
        if (file_exists($this->event->image))
        {
            unlink($this->event->image);
        }
        $this->event->delete();
        return redirect()->back()->with('success','course deleted successfully');
    }


    public function changeStatus($id)
    {
        $this->course = Event::find($id);
        if ($this->course->status ==1)
        {
            $this->course->status =0;
        }elseif ($this->course->status ==0)
        {
            $this->course->status =1;
        }
        $this->course->save();
        return redirect()->back()->with('success','Event status changed successfully.');
    }
}
