<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllEnroll extends Model
{
    use HasFactory;

    protected $fillable = ['course_id','user_id'];

    private static $course;

    public static function createEnroll($request)
    {
        self::$course = new AllEnroll();
        self::$course->user_id = auth()->id();
        self::$course->course_id = $request->id;
        self::$course->save();

    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class);
    }



}
