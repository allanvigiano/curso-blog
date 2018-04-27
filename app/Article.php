<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'description', 'content', 'date_time'];
    protected $hidden = []; 
    protected $dates = ['deleted_at'];
    
}