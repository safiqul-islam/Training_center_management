<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\bitm\FileUpload;
use App\Models\User;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','phone','address','image','description','status'];


    public static function createOrUpdateTeacher($request,$userId, $id = null )
    {


        return Teacher::updateOrCreate(['id'=>$id],[
            'user_id'=>$userId,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'description'=>$request->description,
            'image'=>FileUpload::imageUpload($request->file('image'), 'teacher-image/', isset($id) ? Teacher::find($id)->image : null),
            'status'=>$request->status,
        ]);

    }


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
