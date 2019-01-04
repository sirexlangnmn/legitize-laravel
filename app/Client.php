<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'project_id',
        'client_firstname',
        'client_lastname',
        'client_middlename',
        'image'
    ];

    protected $primaryKey = 'client_id';

    public function project(){
	    return $this->belongsTo('App\Project');
	}
	
}
