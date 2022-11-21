<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    use HasFactory;
    protected $fillable =['live'];

    public static function rules()
    {
        return [
            'live'=>'required|url',
        ];

    }
}
