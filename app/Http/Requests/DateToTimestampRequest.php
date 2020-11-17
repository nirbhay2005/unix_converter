<?php


namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Luezoid\Laravelcore\Requests\BaseRequest;

class DateToTimestampRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'date' => 'bail|required|date',
            'timezone' => ['required',
                Rule::in(['gmt', 'local'])
            ]
        ];
    }
}
