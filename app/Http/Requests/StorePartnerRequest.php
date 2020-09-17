<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
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
            "full_name"    =>['required','max:255'],
            "organization" =>['required'],
            "organization_area"=>['required'],
            "email"        =>['required','email'],
            "proposal"     =>['required']
        ];
    }
}
