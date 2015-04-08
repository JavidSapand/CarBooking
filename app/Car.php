<?php namespace carbooking;

use Illuminate\Database\Eloquent\Model;

class Car extends Model  {
	
	public function booking(){
		return $this->hasMany('carbooking\Booking');
	}
	

}
