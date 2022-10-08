<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\bitm\FileUpload;

class Student extends Model
{
    use HasFactory;


    protected $fillable = ['user_id','phone','address','image','description'];

    private static $student;

    public static function createStudent($request)
    {
        self::$student = new Student();
        self::$student->user_id = auth()->id();
        self::$student->phone = $request->phone;
        self::$student->address = $request->address;
        self::$student->description = $request->description;
        self::$student->image = FileUpload::imageUpload($request->file('image'),'student-image/');
        self::$student->save();

    }


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

}
