<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Pick extends Model
{
	protected $table = 'picks';
	
    public function user()
    {
        return $this->belongsTo(User::class);
    }
 

}