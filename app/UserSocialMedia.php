<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocialMedia extends Model
{
    protected $table = 'user_social_medias';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'platform', 'link'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
