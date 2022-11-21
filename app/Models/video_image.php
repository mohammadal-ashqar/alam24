<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video_image extends Model
{
    use HasFactory;
    protected $fillable=['video','description','position'];


    public static function rules()
    {
        return [
            'video'=>'required|max:255|url',
            'description'=>'required',
            'position'=>'required|in:most,less,main',
        ];

    }

    public static function updateRules()
    {
        return [
            'video'=>'required|max:255|url',
            'description'=>'required',
            'position'=>'required|in:most,less,main',
        ];
    }
}
