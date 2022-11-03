<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{

    use HasFactory;
    protected $fillable=['title','image','content','authar','files','status','category_id'];
    public static function rules()
    {
        return [
            'title'=>'required',
            'image'=>'required|image|mimes:jpeg,jpg,png',
            'status'=>'required',
            'content'=>'required',
            'authar'=>'required|max:30',
            'category_id'=>'required|exists:categories,id'
        ];
    }

    public static function updateRules()
    {
        return [
            'title'=>'required',
            'image'=>'nullable|image|mimes:jpeg,jpg,png',
            'content'=>'required',
            'status'=>'required',
            'authar'=>'required|max:30',
            'category_id'=>'required|exists:categories,id'
        ];
    }
    protected $casts = [
        'files' => 'json',
    ];

    /**
     * Get the category that owns the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

