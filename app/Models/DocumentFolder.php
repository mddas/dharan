<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentFolder extends Model
{
    protected $fillable = [
        'name','descriptions','folder'
    ];

    public function document()
    {
    	return $this->hasMany('App\Models\Document','document_folder_id','id');
    }
    public function childsHasFolder(){
        return $this->hasMany('App\Models\Document','document_folder_id','id')->where('page_type','folder');
    }
}
