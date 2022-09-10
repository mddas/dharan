<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $fillable = [
        'user_id','activity','description'
    ];

    public function user()
	{
	 	return $this->belongsTo('App\Models\User','user_id','id');
		
	}
   }
