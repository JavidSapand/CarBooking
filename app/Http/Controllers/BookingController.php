<?php namespace App\Http\Controllers;

use DB;
use Auth;
use App\Booking;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Validation\Validator as IlluminateValidator;

use App\Http\Requests\BookingRequest;
use Illuminate\Http\Request;

class BookingController extends Controller {

	public function index(){
		 $books = Booking::where('start_date','=',date('Y-m-d'))->get();
		
		//$cars = Booking::getAllCars();
		return view('booking.index',compact('books'));
	}
	public function create(){
		 
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
	    $book->start_date = $request->get('start_date');
	    $book->end_time = $request->get('end_time');
	    $book->end_date = $request->get('end_date');
		$book->source = $request->get('source');
		$book->destination= $request->get('destination');

		
		$data = Booking::where('car_id', '=',$book->car_id)
   			->where('start_time', '=',$book->start_time)
   			->where('start_date', '=',$book->start_date)->count();

   		$sdate = $book->start_date;

	    $edate = $book->end_date;

		$stime = Booking::where('start_time','=',$book->start_time);

		$etime = Booking::where('end_time','=',$book->end_time);

   		if($data >0 ){
			return \Redirect::route('booking.create')->with('message-danger','This record exists in the system you can\'t book it!');
		}else if($sdate != $edate){
			return \Redirect::route('booking.create')->with('message-danger','Please enter the same date! ');
		}
		else if($stime > $etime || $stime == $etime){
		 	return \Redirect::route('booking.create')->with('message-danger','Please enter the correct time!');
		}
		else{
			$book->save();
			return \Redirect::route('booking.index')->with('message','Your booking has been added!');
		}
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
		$book->start_time = $request->get('start_time');
		$book->start_date = $request->get('start_date');
		$book->end_time   = $request->get('end_time');
		$book->end_date   = $request->get('end_date');
		$book->source 	  = $request->get('source');
		$book->destination = $request->get('destination');
		$book->save();
		return \Redirect::route('booking.index',array($book->id))->with('message','Your book has been updated!');
		
	}
	public function destroy($id)
	{
        $user = \Auth::user();
        $list = Booking::findOrFail($id);
        $list->delete();
        return \Redirect::route('booking.index')->with('message','Book has been deleted');
	}
	

}
