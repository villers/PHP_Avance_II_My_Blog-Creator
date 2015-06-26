<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public $timestamps = false;
    protected $table = 'follows';
    protected $fillable = ['user_id', 'user_followed_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
