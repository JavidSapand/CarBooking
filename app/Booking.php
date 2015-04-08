<?php namespace carbooking;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model  {

	public function user(){
		return $this->belongsTo('carbooking\User');
	}

	public function car(){
		return $this->belongsTo('carbooking\Car');
	}
	

}
