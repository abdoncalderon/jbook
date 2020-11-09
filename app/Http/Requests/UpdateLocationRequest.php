<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name'=>'required',
            'code'=>'required',
            'project_id'=>'required',
            'maxtimeopen'=>'required',
            'maxtimenote'=>'required',
            'maxtimecomment'=>'required',
        ];
    }
}
