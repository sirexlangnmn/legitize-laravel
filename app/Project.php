<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_title',
        'website', 
        'email', 
        'telegram', 
        'note'
    ];

    protected $primaryKey = 'project_id';

    public function client(){
	    return $this->hasOne('App\Client');
	}

}
