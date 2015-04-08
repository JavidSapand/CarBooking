<?php namespace carbooking\Http\Controllers;

use carbooking\Booking;
use carbooking\Http\Requests;
use carbooking\Http\Controllers\Controller;

use carbooking\Http\Requests\BookingRequest;
use Illuminate\Http\Request;

class BookingController extends Controller {

	public function index(){
		$lists = Booking::all();
		return view('booking.index',compact('lists',$lists));
	}

	public function create(){
		return view('booking.create');
	}

	public function store(BookingRequest $request){

		$book = new Booking;
		$book->car_id = $request->get('car_id');
	    $book->user_id = $request->get('user_id');
		$book->start_time = $request->get('start_time');
		$book->end_time = $request->get('end_time');
		$book->source = $request->get('source');
		$book->destination= $request->get('destination');
		$book->save();

	   // return \Redirect::route('booking.show',array($book->id))->with('message','Your book ahs been created!');
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
