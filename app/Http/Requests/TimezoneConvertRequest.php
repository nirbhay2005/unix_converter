<?php


namespace App\Http\Requests;

use Luezoid\Laravelcore\Requests\BaseRequest;

class TimezoneConvertRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'timestamp' => 'bail|required|integer|digits_between:1,13',
            'timezone' => 'required|string'
        ];
    }
}
