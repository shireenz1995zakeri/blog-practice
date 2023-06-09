<?php

namespace App\Http\Requests\Panel\User;

use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class UpdeteProfileRequest extends FormRequest
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
        return [
            'profile' =>['nullable','image','max:2024'],
            'name'=>['required','string','max:255'],
            'mobile'=>['required','string','max:255',Rule::unique('users')->ignore(auth()->user()->id)],
            'email'=>['required','string','max:255',Rule::unique('users')->ignore(auth()->user()->id)],
            'password'=>['nullable','min:8']



        ];
    }
}
