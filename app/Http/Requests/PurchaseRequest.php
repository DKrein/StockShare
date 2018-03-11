<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class RegisterRequest.
 */
class PurchaseRequest extends Request
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
        return [
            'company_name' => 'required|string|max:200',
            'share_instrument_name' => 'required|string|max:10',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|integer|min:1',
            'certificate_number' => 'required|string|min:17',
        ];
    }
   
}
