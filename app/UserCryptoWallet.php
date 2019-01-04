<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCryptoWallet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'platform', 'key'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
