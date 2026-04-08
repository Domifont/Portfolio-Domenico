<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Searchable;
    protected $fillable = ['title' , 'subtitle' , 'body' , 'img' , 'user_id', 'category_id', 'is_accepted','slug'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function toSearchableArray()
    {
        return[
            'id'=>$this->id,
            'title'=>$this->title,
            'subtitle'=>$this->subtitle,
            'body'=>$this->body,
            'category'=>$this->category,
        ];
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function getRouteKeyName(){

        return 'slug';
    }

    public function readDuration(){
        $totalWords = Str::wordCount($this->body);
        $minutesToRead = round($totalWords / 150);

        return intval($minutesToRead);
    }
}
