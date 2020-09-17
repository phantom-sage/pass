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
<<<<<<< HEAD
            "full_name"    =>['required','max:255'],
            "organization" =>['required'],
            "organization_area"=>['required'],
=======
            "forth_name"    =>['string', 'required', 'min:8', 'max:255'],
            'business_area' => ['string', 'required', 'min:8', 'max:255'],
            "organization_name" =>['string', 'required', 'min:8', 'max:255'],
>>>>>>> 4b8e9f99dd0eae9929cf3cc42e7a0bc363701d28
            "email"        =>['required','email'],
            "partnership_proposal"     =>['required', 'string', 'min:8']
        ];
    }
}
