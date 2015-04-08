<?php namespace carbooking\Http\Requests;

use carbooking\Http\Requests\Request;

class BookingRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'source' => 'required',
			'destination' => 'required'
		];
	}

}
