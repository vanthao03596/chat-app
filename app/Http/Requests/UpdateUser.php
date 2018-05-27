<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UpdateUser extends FormRequest
{
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
        $user = User::find($this->user);
		return [
			'name' => 'required|max:255',
			'email' => 'required|email|unique:users,email,' . $user->id,
			'image' => 'mimes:jpeg,bmp,png,jpg'
		];
	}
}
