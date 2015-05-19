<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCustomerRequest extends Request {

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
			'company' => 'required',
			'city' => 'required',
			'adress' => 'required',
			'phone' => 'required',
			'mail' => 'required',
			'orgnr' => 'required',
			'owner' => 'required',
			'routes_id' => 'required',
			'sort' => 'required',
			'companyId' => 'required'
		];
	}

}
