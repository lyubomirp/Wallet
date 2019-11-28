<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepositRequest extends FormRequest
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
        $this->array_strip_tags(parent::all());
        return [
            'requested_amount'=>'required|numeric|between:0,9999999999.99',
            'currency'=>'required|in:eur,usd,gbp|min:1|max:3',
            'commission_fee'=>'required|numeric'
        ];
    }

    public function array_strip_tags(Array $array)
    {
        $result = array();

        foreach ($array as $key => $value) {
            $key = strip_tags($key);
            if (is_array($value)) {
                $result[$key] = static::array_strip_tags($value);
            } else {
                $result[$key] = trim(strip_tags($value));
            }
        }

        return $result;
    }
}
