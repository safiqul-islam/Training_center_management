<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\bitm\FileUpload;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','image'];

    private static $course;

    public static function createOrUpdateEvent($request, $id = null )
    {


        return Event::updateOrCreate(['id'=>$id],[
            'title'=>$request->title,
            'description'=>$request->description,
            'starting_date' => $request->starting_date,
            'image'=>FileUpload::imageUpload($request->file('image'), 'event-image/', isset($id) ? Event::find($id)->image : null),
            'status'=>$request->status,
        ]);

    }





//    public static function createEvent($request)
//    {
//        self::$course = new Event();
//        self::$course->title = $request->title;
//        self::$course->description = $request->description;
//        self::$course->starting_date = $request->starting_date;
//        self::$course->image = FileUpload::imageUpload($request->file('image'),'event-banner/');
//        self::$course->save();
//    }


}
