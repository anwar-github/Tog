<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardExpirationMonth;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardNumber;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the User is authorized to make this request.
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
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'email'            => 'required|string|email|max:255|unique:users',
//            //            'password'   => 'required|string|min:6|confirmed',
//            'card_number'      => [ 'required', new CardNumber() ],
//            'date'             => 'required|date',
//            'expiration_year'  => [ 'required', new CardExpirationYear($this->get('expiration_month')) ],
//            'expiration_month' => [ 'required', new CardExpirationMonth($this->get('expiration_year')) ],
//            'cvc'              => [ 'required', new CardCvc($this->get('card_number')) ]
        ];
    }
}
