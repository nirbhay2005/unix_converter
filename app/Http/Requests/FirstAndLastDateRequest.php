<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FirstAndLastDateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'format' => ['required',
                Rule::in(['year', 'month', 'day'])
            ],
            'date' => ['required', 'date'],
            //'year' => 'bail|required|numeric|digits:4',
            //'month' => 'bail|exclude_if:format,year|required|numeric|min:1|max:12|digits_between:1,2',
            //'Day' => 'bail|exclude_unless:format,day|required|numeric|min:1|max:31|digits_between:1,2',
            'timezone' => ['required',
                Rule::in(['gmt', 'local'])
            ]
        ];
    }
}
