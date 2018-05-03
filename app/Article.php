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

    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public static function listArticles($paginate) {
        $articleList = Article::select('id', 'title', 'description', 'user_id', 'date_time')->paginate($paginate);


        foreach ($articleList as $key => $article) {
            $article->date_time = substr($article->date_time, 0, 10);
            $article->user_id = $article->user->name;
            unset($article->user);
        }

        return $articleList;
    }
    public static function listArticlesHomePage($paginate, $search = null) {

        if($search) {
            $articleList = Article::select('id', 'title', 'description', 'user_id', 'date_time')
            ->whereDate('date_time', '<=', date("Y-m-d"))
            ->where(function ($query) use($search){
                $query->orWhere('title',        'like', '%'.$search.'%')
                      ->orWhere('description', 'like', '%'.$search.'%');
            })
            ->orderBy('date_time', 'DESC')
            ->paginate($paginate);
        }
        else {
            $articleList = Article::select('id', 'title', 'description', 'user_id', 'date_time')
                                    ->whereDate('date_time', '<=', date("Y-m-d"))
                                    ->orderBy('date_time', 'DESC')
                                    ->paginate($paginate);
        }

        foreach ($articleList as $key => $article) {
            $article->date_time = substr($article->date_time, 0, 10);
            $article->author = $article->user->name;
            unset($article->user);
        }

        return $articleList;
    }
}
