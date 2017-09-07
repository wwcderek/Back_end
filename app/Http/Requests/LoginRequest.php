<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Providers\Validator;

class LoginRequest extends FormRequest
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
        $date = date("Y-m-d H:i:s");
        return [
            //
            'name' => 'required|max:15|min:6|without_spaces',
//            'lName' => 'required|max:15|min:1|without_spaces',
//            'phone' => 'required|max:8|min:8|without_spaces',
//            'cardNumber' => 'required|max:16|min:14|without_spaces',
//            'amount' => 'required|min:1|without_spaces',
//            'currency' => 'required|currency',
//            'cardCVC' => 'required|min:3|max:4|without_spaces',
//            'cardExpiry' => 'required|max:5|min:5|without_spaces|date_format:m/y|after:'.$date
        ];
    }


    public function messages()
    {
        return [
            'currency' => 'We only accept USD/EUR/AUD.',
            'without_spaces' => 'Cannot input space.',
        ];
    }
}