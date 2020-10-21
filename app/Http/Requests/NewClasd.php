<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewClasd extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'timestamp' => 'required|integer|digits_between:1,13',
        ];
    }
}
