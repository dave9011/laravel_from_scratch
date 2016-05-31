<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

	protected $fillable = ['body'];

    //We can use this function to retrieve the Card that this Note belongs to
    public function card() {
    	return $this->belongsTo(Card::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
