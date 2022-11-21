<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poster extends Model
{
    use HasFactory;
    protected $fillable =['images','name','poster_adress_id','route'];

    public static function rules()
    {
        return [
            'images.*'=>'required|image|mimes:jpeg,jpg,png,bmp|max:5000',
            'name'=>'required|max:20',
            'route'=>'required|url',
            'poster_adress_id'=>'required|exists:poster_adresses,id',
      ];
   

    }


    public static function UpdateRules()
    {
        return [
            'name'=>'required|max:20',
            'route'=>'required|url',
            'images.*'=>'nullable|image|mimes:jpeg,jpg,png|max:5000',
            'poster_adress_id'=>'required|exists:poster_adresses,id'

        ];
    }
    protected $casts = [
        'images' => 'json',
    ];
    public function poster_adress()
    {
        return $this->belongsTo(poster_adress::class);
    }
}
