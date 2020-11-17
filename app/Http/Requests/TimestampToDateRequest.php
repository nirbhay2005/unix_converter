<?php

namespace App\Http\Requests;

use Luezoid\Laravelcore\Requests\BaseRequest;

class TimestampToDateRequest extends BaseRequest
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
