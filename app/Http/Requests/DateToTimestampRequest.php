<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DateToTimestampRequest extends FormRequest
{
    public function rules()
    {
        return [
            'date' => 'bail|required|date',
            'tz' => ['required',
                Rule::in(['gmt', 'local'])
            ]
        ];
    }
}
