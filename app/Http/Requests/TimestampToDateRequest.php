<?php


namespace App\Http\Requests;


use Luezoid\Laravelcore\Requests\BaseRequest;

class TimestampToDateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'timeStamp' => 'required|integer|digits_between:1,13',
        ];
    }
}
