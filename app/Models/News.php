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
            'title'=>'required|max:255',
            'image'=>'required|image|mimes:jpeg,jpg,png|max:1024',
            'files*'=>'nullable|image|mimes:jpeg,jpg,png|max:5000',
            'status'=>'required',
            'content'=>'required',
            'authar'=>'required|max:30',
            'category_id'=>'required|exists:categories,id'
        ];
    }

    public static function updateRules()
    {
        return [
            'title'=>'required|max:255',
            'image'=>'nullable|image|mimes:jpeg,jpg,png|max:1024',
            'files*'=>'nullable|image|mimes:jpeg,jpg,png|max:5000',
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

