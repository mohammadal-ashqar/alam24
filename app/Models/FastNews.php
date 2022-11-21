<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FastNews extends Model
{
    use HasFactory;
    protected $fillable =['news'];

    public static function rules()
    {
        return [
            'news'=>'required|string',
        ];

    }
}
