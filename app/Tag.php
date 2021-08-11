<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'posts_tags'); //Pertence a muitos post {{ tabela posts_tags tem relacionamento muitos pra muitos }}
    }
}
