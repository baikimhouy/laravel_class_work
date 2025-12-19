<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','menu_id', 'subtitle', 'content', 'description', 'slug', 'image'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
