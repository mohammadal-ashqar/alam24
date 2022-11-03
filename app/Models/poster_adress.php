<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poster_adress extends Model
{
    use HasFactory;
    protected $fillable =['name'];

    public static function rules()
    {
        return [
            'name'=>'required|max:20',
        ];
    }


    /**
     * Get all of the comments for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posters()
    {
        return $this->hasMany(poster::class);
    }
}
