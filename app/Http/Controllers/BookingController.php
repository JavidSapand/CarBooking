<?php namespace App\Http\Controllers;

use DB;
use Auth;
use App\Booking;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Http\Requests\BookingRequest;
use Illuminate\Http\Request;

class BookingController extends Controller {

	public function index(){
		$books = Booking::all();
		//$cars = Booking::getAllCars();
		return view('booking.index',compact('books'));
	}

	public function create(){
		
		//$cars = Booking::getAllCars();
		$car = DB::table('cars')->lists('plate_no','id');
		return view('booking.create',compact('car'));
	}

	public function store(BookingRequest $request){


		$book = new Booking;

		
		if(Auth::guest())
		{
			$book->user_id = 1;
		}
		else
		{	
	    	$book->user_id = Auth::user()->id;
	    }
	   
	    $book->car_id = $request->get('id');
	    $book->start_time = $request->get('start_time');
	    $s_date = Carbon::parse($request->get('start_date'));
	    $book->start_date = $s_date;
	    $book->end_time = $request->get('end_time');
		$e_date = Carbon::parse($request->get('end_date'));
	    $book->end_date = $e_date;
		$book->source = $request->get('source');
		$book->destination= $request->get('destination');
		$book->save();
		
		return view('booking.store',compact('book','message','Your Book Added!'));
	}

	public function show($id){
		$book = Booking::find($id);
		return view('booking.show',compact('book',$book));

	}

	public function edit($id){
		$book = Booking::find($id);
		return view('booking.edit',compact('book',$book));

	}

	public function update($id, BookingRequest $request){

		$book = Booking::find($id);

		$book->source = $request->get('source');
		$book->destination = $request->get('destination');
		$book->save();

		return \Redirect::route('booking.index',array($book->id))->with('message','Your book has been updated!');
	}

}
