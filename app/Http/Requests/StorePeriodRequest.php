<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeriodRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name'=>'required|unique:periods',
<<<<<<< HEAD
            'start'=>'required|time',
            'finish'=>'required|time',
=======
            'start'=>'required',
            'finish'=>'required',
>>>>>>> ca1c9b7aa4940f45e80048f14039b928a2c6dfdd
        ];
    }
}
