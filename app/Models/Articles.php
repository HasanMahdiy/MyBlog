<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id', 'title', 'image', 'content', 'hit','slug'];
    public $timestamps = false;

    public function category(){
        return $this->hasOne('App\Models\Category', 'id', 'category_id');

}
}
