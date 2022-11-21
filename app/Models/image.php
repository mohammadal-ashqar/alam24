<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $fillable=['image','description','position'];


    public static function rules()
    {
        return [
            'image'=>'required|image|mimes:jpeg,jpg,png|max:1024',
            'description'=>'required',
            'position'=>'required|in:most,less,main',
        ];

    }

    public static function updateRules()
    {
        return [
            'image'=>'nullable|image|mimes:jpeg,jpg,png|max:1024',
            'description'=>'required',
            'position'=>'required|in:most,less,main',
        ];
    }
}
