<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'workbook_id'=>'required',
            'period_id'=>'required',
            'dateNote'=>'required',
            'note'=>'required',
            'user_id'=>'required',
        ];
    }
}
