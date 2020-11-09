<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name'=>'required|unique:locations',
            'code'=>'required|unique:locations',
            'project_id'=>'required',
            'maxtimeopen'=>'required',
            'maxtimenote'=>'required',
            'maxtimecomment'=>'required',
        ];
    }
}
