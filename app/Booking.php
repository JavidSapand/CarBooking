<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model  {

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function car(){
		return $this->belongsTo('App\Car');
	}

	public static function getAllCars(){
		return DB::table('cars')->get();
	}
	

}
