<?php

namespace App\Models;

use App\bitm\FileUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title','price'.'short_description','starting_date','long_description','image','status'];

    private static $course;

    public static function createCourse($request)
    {
        self::$course = new Course();
        self::$course->user_id = auth()->id();
        self::$course->title = $request->title;
        self::$course->price = $request->price;
        self::$course->short_description = $request->short_description;
        self::$course->starting_date = $request->starting_date;
        self::$course->long_description = $request->long_description;
        self::$course->image = FileUpload::imageUpload($request->file('image'),'course-banner/');
        self::$course->save();

    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }



}
