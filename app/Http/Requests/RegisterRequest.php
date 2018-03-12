<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
//use Illuminate\Validation\Rule;

/**
 * Class RegisterRequest.
 */
class RegisterRequest extends Request
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
    public function rules() {
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ];
        
        foreach($this->request->get('email_address') as $key => $val) {
            $rules['email_address.'.$key] = 'required|string|email|max:255|unique:user_email_addresses,email_address';
        }
        
        return $rules;
    }
   
}
