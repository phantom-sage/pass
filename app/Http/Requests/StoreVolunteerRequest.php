<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVolunteerRequest extends FormRequest
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
         "full_name" =>['required','max:255'],
         "work_place" =>['required','max:255'],
         "email" =>['required','email'],
         "phone" =>['required','max:10','min:10'],
         "age" =>['required'],
         "gender" =>['required'],
         "qualification" =>['required']
     ];
    }
}
