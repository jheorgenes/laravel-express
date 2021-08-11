<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [ //Cria os campos
        'title',
        'content'
    ];

    public function comments()  //Acessando comments\ através do post
    {
        return $this->hasMany('App\Comment'); //Tem muitos comentários
    }

    public function tags()  //Acessando tags através do post
    {
        return $this->belongsToMany('App\Tag', 'posts_tags'); //Pertence a muitas tag {{posts_tags é uma tabela de relacionamento muitos pra muitos }}
    }
}
