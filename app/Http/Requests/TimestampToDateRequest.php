<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimestampToDateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'timestamp' => 'bail|required|integer|digits_between:1,13',
        ];
    }

    public function messages()
    {
        return [
            'timestamp.integer' => 'Invalid Timestamp',
            'timestamp.digits_between' => 'Invalid Timestamp'
        ];
    }
}
