<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poster extends Model
{
    use HasFactory;
    protected $fillable =['image','name','poster_adress_id'];

    public static function rules()
    {
        return [
            'name'=>'required|max:20',
            'image'=>'required|image|mimes:jpeg,jpg,png',
            'poster_adress_id'=>'required|exists:poster_adresses,id'
        ];
    }

    public static function UpdateRules()
    {
        return [
            'name'=>'required|max:20',
            'image'=>'nullable |image|mimes:jpeg,jpg,png',
            'poster_adress_id'=>'required|exists:poster_adresses,id'

        ];
    }
    public function poster_adress()
    {
        return $this->belongsTo(poster_adress::class);
    }
}
